<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'siwB6ebJlm5EmzeJ4osg', 'baseDeDatosECommerce');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
}