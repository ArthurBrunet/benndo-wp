<?php
include 'data.php';

$img_navigate =     '<img class="img_marker" title ="Naviguer vers"     src="' . get_template_directory_uri() . '/assets/img/navigate.svg" alt="Naviguer vers">';
$img_trash_full =   '<img class="img_marker" title ="Benne pleine"      src="' . get_template_directory_uri() . '/assets/img/trash-full.svg" alt="Benne Pleine">';
$img_trash_broken = '<img class="img_marker" title ="Benne déféctueuse" src="' . get_template_directory_uri() . '/assets/img/trash-broken.svg" alt="Benne Déféctueuse">';
$img_yes =          '<img class="img_marker" title ="Oui"               src="' . get_template_directory_uri() . '/assets/img/yes.svg" alt="Oui">';
$img_no =           '<img class="img_marker" title ="Non"               src="' . get_template_directory_uri() . '/assets/img/no.svg" alt="Non">';

$green_marker =             get_template_directory_uri() . '/assets/img/green.png';
$red_marker =               get_template_directory_uri() . '/assets/img/red.png';
?>


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
        accessToken: mapboxgl.accessToken,
        interactive: false,
        controls:
            {inputs: false}
    });
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    const a = 1;

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [1.43, 43.7],
        zoom: 15
    });

    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 1
    };
    const geojson =
        {
            "type": "FeatureCollection",
            "features": []
        };
    //console.log(geojson);

    function success(pos) {
        var crd = pos.coords;


        console.log('Votre position actuelle est :');
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude : ${crd.longitude}`);
        console.log(`La précision est de ${crd.accuracy} mètres.`);

        function httpGet(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
            xmlHttp.send( null );
            return xmlHttp.responseText;
        }


        var long = String(crd.longitude).replace('.','I');
        var lat = String(crd.latitude).replace('.','I');

        var objs = JSON.parse(httpGet('http://localhost:8001/bins/getone/'+ long +'/'+ lat +'/300'));
        var objs1 = JSON.parse(httpGet('http://localhost:8001/bins/getonedistance/'+ long +'/'+ lat +'/300000000000'));
        Direction.setDestination(objs1[0].Point);
        Direction.setOrigin([crd.longitude, crd.latitude]);

        geojson.features.push (
            {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [objs1[0].Point[0], objs1[0].Point[1]]
                },
                "properties": {
                    "city": objs1[0].city,
                    "id": objs1[0].id,
                    "status" : 1
                }
            },
        )

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
                            '<button type="button" class="btn btn-info mr-3" onclick="navigate(' + marker.geometry.coordinates[0] + ',' + marker.geometry.coordinates[1] + ')"><?= $img_navigate ?></button>' +
                            '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                            '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
                        )
                    )

                    .addTo(map);

            }
        });

    }


    map.addControl(geocoder);

    function error(err) {
        Direction.interactive(true);
        $("#map").click(function() {
            var delayInMilliseconds = 500;
            setTimeout(function() {
                // à changer pour éviter de refaire la function si tu es sur le même Origin

                if (origin !== Direction.getOrigin())
                {
                    var origin = Direction.getOrigin();
                    function httpGet(theUrl)
                    {
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
                        xmlHttp.send( null );
                        return xmlHttp.responseText;
                    }
                    var long = String(origin.geometry.coordinates[0]).replace('.','I');
                    var lat = String(origin.geometry.coordinates[1]).replace('.','I');
                    var objs1 = JSON.parse(httpGet('http://localhost:8001/bins/getonedistance/'+ long +'/'+ lat +'/3000000'));
                    Direction.setDestination(objs1[0].Point);
                    var objs = JSON.parse(httpGet('http://localhost:8001/bins/getone/'+ long +'/'+ lat +'/1000'));
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
                    }
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
                                        '<button type="button" class="btn btn-info mr-3" onclick="navigate(' + marker.geometry.coordinates[0] + ',' + marker.geometry.coordinates[1] + ')"><?= $img_navigate ?></button>' +
                                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                                        '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
                                    )
                                )

                                .addTo(map);

                        }
                    });
                }

            }, delayInMilliseconds);
        });
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






    function navigate(i,y)
    {
        Direction.setDestination([i,y]);
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

                        '<button type="button" class="btn btn-info mr-3" onclick="navigate('+ marker.geometry.coordinates[0]+','+marker.geometry.coordinates[1] +')"><?= $img_navigate ?></button>' +
                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full(\'' + marker.properties.id + '\', \'<?= $hash ?>\')"><?= $img_trash_full ?></button>' +
                        '<button type="button" class="btn btn-danger" onclick="broken_full(\'' + marker.properties.id + '\', \'<?= $hash ?>\')"><?= $img_trash_broken ?></button>'
                    )
                )


                .addTo(map);

        }

    });


    map.addControl(
        Direction,
        'bottom-left'
    );


</script>