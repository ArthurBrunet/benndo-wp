<?php
$img_navigate =     '<img class="img_marker" title ="Naviguer vers"     src="' . get_template_directory_uri() . '/assets/img/navigate.svg" alt="Naviguer vers">';
$img_trash_full =   '<img class="img_marker" title ="Benne pleine"      src="' . get_template_directory_uri() . '/assets/img/trash-full.svg" alt="Benne Pleine">';
$img_trash_broken = '<img class="img_marker" title ="Benne déféctueuse" src="' . get_template_directory_uri() . '/assets/img/trash-broken.svg" alt="Benne Déféctueuse">';
$img_yes =          '<img class="img_marker" title ="Oui"               src="' . get_template_directory_uri() . '/assets/img/yes.svg" alt="Oui">';
$img_no =           '<img class="img_marker" title ="Non"               src="' . get_template_directory_uri() . '/assets/img/no.svg" alt="Non">';

$green_marker =             get_template_directory_uri() . '/assets/img/green.png';
$red_marker =               get_template_directory_uri() . '/assets/img/red.png';

$api = json_decode('
{
  "0": [
    { 
    "id":"b7b18dfd-9178-4b64-b10f-1e06bac1696a",
    "coords":"SRID=4326;POINT(1.52074078929 43.5615354615)",
    "name":"pas renseign\u00e9",
    "city":"Saint-111111111111111",
    "city_code":31506,
    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},
    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}
    }
  ],
  "1": [
    {
    "id":"b7b18dfd-9178-4b64-b10f-1e06bac1696a",
    "coords":"SRID=4326;POINT(1.62074078929 43.6615354615)",
    "name":"pas renseign\u00e9",
    "city":"Saint-2222222222222222222",
    "city_code":31506,
    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},
    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}
    }
  ],
    "2": [
    {
    "id":"b7b18dfd-9178-4b64-b10f-1e06bac1696a",
    "coords":"SRID=4326;POINT(1.65074078929 43.5615354615)",
    "name":"pas renseign\u00e9",
    "city":"Saint-33333333333333333333333",
    "city_code":31506,
    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},
    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}
    }
  ]
  
 }
 ', true);

?>
<pre>
<?php
//var_dump($api);
?>
</pre>

<script>
    const json = '{\n  "0": [\n    { \n    "id":"id1",\n    "coords":"SRID=4326;POINT(1.52074078929 43.5615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-111111111111111",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ],\n  "1": [\n    {\n    "id":"id2",\n    "coords":"SRID=4326;POINT(1.62074078929 43.6615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-2222222222222222222",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ],\n    "2": [\n    {\n    "id":"id3",\n    "coords":"SRID=4326;POINT(1.65074078929 43.5615354615)",\n    "name":"pas renseign\u00e9",\n    "city":"Saint-33333333333333333333333",\n    "city_code":31506,\n    "created_at":{"date":"2020-01-0911:05:37.000000","timezone_type":3,"timezone":"Europe\/Berlin"},\n    "updated_at":{"date":"2020-01-0914:20:42.000000","timezone_type":3,"timezone":"Europe\/Berlin"}\n    }\n  ]\n  \n }';
    var objs = JSON.parse(json);

    var result = [];
    for(var index in objs) {
        var attr = objs[index];
        result.push (
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
        )}

    //console.log(result)

    var a = "connard";

    a += result;
    console.log(a);
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
    var a = 1;
    mapboxgl.accessToken = 'pk.eyJ1Ijoia2FuYXJwcDIiLCJhIjoiY2szazZ6bnJjMDgwYzNtbm1zNHFocGZzNiJ9._V5QyjDorkoGktSpNHc1nA';

    var geojson = {
        "type": "FeatureCollection",
        "features": [

            document.write(result2);

        ]
    }

    //console.log(geojson)

    /*var geojson = {
        "type": "FeatureCollection",
        "features": [

        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [-77.032, 38.913]
            },
            "properties": {
                "city": "C'est un titre",
                "id": "bla12id",
                "status" : 1,
            }
        },

        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [-122.414, 37.776]
            },
            "properties": {
                "city": "C'est un titre",
                "id": "bla12id",
                "status" : 1,
            }
        }

        ]
    };*/




    // Create the map
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [-96, 37.8],
        zoom: 3
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
        if (marker.properties.full === 0 && marker.properties.broken === 0) {

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
                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                        '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
                    )
                )

                .addTo(map);
        }

        // if the trash are full but not broken
        if (marker.properties.full === 1 && marker.properties.broken === 0) {

            // create a HTML element for each feature
            var el = document.createElement('div');
            el.className = 'marker_red';

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                    .setHTML(
                        '<h5>' + marker.properties.city + '</h5><br>' +
                        '<h6>' + marker.properties.id + '</h6><br>' +
                        '<button type="button" class="btn btn-info mr-3" onclick=""><?= $img_navigate ?></button>' +
                        '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                        '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
                    )
                )

                .addTo(map);
        }


    });


</script>