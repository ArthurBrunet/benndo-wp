<?php
    $request = 'https://data.toulouse-metropole.fr/api/records/1.0/search/?dataset=recup-verre';

    if( is_wp_error( $request ) ) {
        return false; // Si il y a une erreur, on s'arrête là
    }
    $raw = file_get_contents($request);
    $json = json_decode($raw, true);
