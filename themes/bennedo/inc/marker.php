<?php

$img_navigate =     '<img class="img_marker" title ="Naviguer vers"     src="' . get_template_directory_uri() . '/assets/img/navigate.svg" alt="Naviguer vers">';
$img_trash_full =   '<img class="img_marker" title ="Benne pleine"      src="' . get_template_directory_uri() . '/assets/img/trash-full.svg" alt="Benne Pleine">';
$img_trash_broken = '<img class="img_marker" title ="Benne déféctueuse" src="' . get_template_directory_uri() . '/assets/img/trash-broken.svg" alt="Benne Déféctueuse">';
$img_yes =          '<img class="img_marker" title ="Oui"               src="' . get_template_directory_uri() . '/assets/img/yes.svg" alt="Oui">';
$img_no =           '<img class="img_marker" title ="Non"               src="' . get_template_directory_uri() . '/assets/img/no.svg" alt="Non">';
$bla = 1;


$i = 0;
foreach ($json["records"] as $value){

               $long = $value['geometry']['coordinates'][0];
               $lat = $value['geometry']['coordinates'][1];
               $adress = $value['fields']['commune'];

    $i++;
    ?>
    <script>
        var coord = [<?= $long .','. $lat ?>];
        <?php if ($bla == 1){ ?>
        var popup = new mapboxgl.Popup({ offset: 25 })
            .setHTML(
                '<h5 class="">24 place St Marc <br>76000 <?= $adress ?></h5><br>' +
                '<button type="button" class="btn btn-info mr-3" onclick=""><?= $img_navigate ?></button>' +
                '<button type="button" class="btn btn-danger mr-3" onclick="trash_full()"><?= $img_trash_full ?></button>' +
                '<button type="button" class="btn btn-danger" onclick="broken_full()"><?= $img_trash_broken ?></button>'
            );
            <?php } else { ?>
        var popup = new mapboxgl.Popup({ offset: 25 })
            .setHTML(
                '<h5 class="">24 place St Marc <br>76000 <?= $adress ?></h5><br>' +
                '<h6>La benne est elle toujours pleine ?</h6><br>' +
                '<button type="button" class="btn btn-info mr-3" onclick=""><?= $img_navigate ?></button>' +
                '<button type="button" class="btn btn-success mr-3" onclick="yes()"><?= $img_yes ?></button>' +
                '<button type="button" class="btn btn-danger" onclick="no()"><?= $img_no ?></button>'
            );
            <?php } ?>

        var marker = new mapboxgl.Marker()
            .setLngLat(coord)
            .setPopup(popup) // sets a popup on this marker
            .addTo(map);


    </script>
<?php
} ?>


