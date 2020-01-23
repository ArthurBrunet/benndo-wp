<?php
$img_navigate =     '<img class="img_marker" title ="Naviguer vers"     src="' . get_template_directory_uri() . '/assets/img/navigate.svg" alt="Naviguer vers">';
$img_trash_full =   '<img class="img_marker" title ="Benne pleine"      src="' . get_template_directory_uri() . '/assets/img/trash-full.svg" alt="Benne Pleine">';
$img_trash_broken = '<img class="img_marker" title ="Benne déféctueuse" src="' . get_template_directory_uri() . '/assets/img/trash-broken.svg" alt="Benne Déféctueuse">';
$img_yes =          '<img class="img_marker" title ="Oui"               src="' . get_template_directory_uri() . '/assets/img/yes.svg" alt="Oui">';
$img_no =           '<img class="img_marker" title ="Non"               src="' . get_template_directory_uri() . '/assets/img/no.svg" alt="Non">';

$green_marker =             get_template_directory_uri() . '/assets/img/green.png';
$red_marker =               get_template_directory_uri() . '/assets/img/red.png';

?>
<script>
    function httpGet(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }

    var objs = JSON.parse(httpGet('http://localhost:8001/bins/getall'));

    //console.log(objs);

    const geojson =
        {
            "type": "FeatureCollection",
            "features": []
        };
    //console.log(geojson);

    for(let i = 0; i < objs.length; i++) {
        const obj = objs[i];

        // code qui check et update le statut

        geojson.features.push (
            {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [obj.Point[0], obj.Point[1]]
                },
                "properties": {
                    "city": obj.city,
                    "id": obj.id,
                    "status" : 1
                }
            },
        )
        //console.log(obj.id);
    }

    console.log(geojson);
</script>

<style>
    .marker_green {
        background-image: url('<?=  $green_marker ?>');
        background-size: cover;
        width: 30px;
        height: 50px;
        cursor: pointer;
    }

    .marker_red {
        background-image: url('<?=  $red_marker ?>');
        background-size: cover;
        width: 30px;
        height: 50px;
        cursor: pointer;
    }

    .mapboxgl-popup {
        max-width: 200px;
        border-radius: 15px;
    }
    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }

</style>

<script>
    const a = 1;
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FuYXJwcDIiLCJhIjoiY2szazZ6bnJjMDgwYzNtbm1zNHFocGZzNiJ9._V5QyjDorkoGktSpNHc1nA';

    // Create the map
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [1.43, 43.7],
        zoom: 15
    });


    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );

    // add markers to map
    geojson.features.forEach(function(marker) {

        // if the trash are not full neither broken
        if (marker.properties.status === 1) {

            // create a HTML element for each feature
            var el = document.createElement('div');
            el.className = 'marker_green';

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                    .setHTML(
                        '<h5>' + marker.properties.city + '</h5><br>' +
                        '<h6>' + marker.properties.id + '</h6><br>' +
                        '<button type="button" class="btn btn-info mr-3" onclick=""><?= $img_navigate ?></button>' +
                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_yes ?></button>' +
                        '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_no ?></button>'
                    )
                )

                .addTo(map);
        }

    });


</script>