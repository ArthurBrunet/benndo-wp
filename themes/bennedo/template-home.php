<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div class="map-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">
                <img class="logo" src="<?= get_template_directory_uri() . '/assets/img/logo.svg' ?>" alt="logo">
                Bennedo
            </h2>
            <p class="text-center">Localiser la benne à verre la plus proche de chez vous.</p>
        </div>
    </div>

    <div id="mapid"></div>
<?php get_footer()?>
