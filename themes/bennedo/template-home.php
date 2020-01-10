<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>


<div class="map-clean">
    <div class="container">
        <div class="">
            <h2 class="text-center main-title">
                <img class="logo" src="<?= get_template_directory_uri() . '/assets/img/logo.png' ?>" alt="logo">
                Bennedo
            </h2>
            <p class="text-center main-p">Localiser la benne à verre la plus proche de chez vous.</p>
        </div>
    </div>

    <div id='map'></div>

<?php
include "inc/data.php";
get_footer()?>
