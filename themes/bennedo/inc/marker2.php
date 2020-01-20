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
    const json = '{\n  "0": [\n    { \n    "id":"id1",\n    "coords":"SRID=4326;POINT(1.52074078929 43.5615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-111111111111111",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ],\n  "1": [\n    {\n    "id":"id2",\n    "coords":"SRID=4326;POINT(1.62074078929 43.6615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-2222222222222222222",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ],\n    "2": [\n    {\n    "id":"id3",\n    "coords":"SRID=4326;POINT(1.65074078929 43.5615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-33333333333333333333333",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ]\n  \n }';
    var objs = JSON.parse(json);

    var geojson =
        {
            "type": "FeatureCollection",
            "features": [

            ]
        };

    for(var index in objs) {
        var attr = objs[index];
        geojson.features.push (
            {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [-77.032, 38.913]
                },
                "properties": {
                    "city": attr[0].city,
                    "id": attr[0].id,
                    "status" : 1,
                }
            },
        )



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
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FuYXJwcDIiLCJhIjoiY2szazZ6bnJjMDgwYzNtbm1zNHFocGZzNiJ9._V5QyjDorkoGktSpNHc1nA';
    var Direction = new MapboxDirections({
        accessToken: mapboxgl.accessToken
    });

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [-77.032, 38.913],
        zoom: 15
    });

    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 1
    };

    function success(pos) {
        var crd = pos.coords;

        console.log('Votre position actuelle est :');
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude : ${crd.longitude}`);
        console.log(`La précision est de ${crd.accuracy} mètres.`);
        Direction.setOrigin([crd.longitude, crd.latitude]);
    }



    function error(err) {

    }

    navigator.geolocation.getCurrentPosition(success, error, options);

    // Create the map


    //Creation de la geolocalisation
    map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            showUserLocation: true,
            trackUserLocation: true
    }));

    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    }));




    function navigate(i)
    {
        console.log(i);
    }


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
                        '<button type="button" class="btn btn-info mr-3" onclick="navigate('+ marker.geometry.coordinates +')"><?= $img_navigate ?></button>' +
                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                        '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
                    )
                )

                .addTo(map);
            console.log(marker.geometry.coordinates)
        }






    });
    map.addControl(
        Direction,
        'bottom-left'
    );

</script>