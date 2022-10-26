<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');


function incluirTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/${nombre}.php"; 
}

function debuguear( $variable ){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}
function debuguearNoExit( $variable ){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

function debuguearjson($variable){
    echo "<pre>";
    echo json_encode($variable);
    echo "</pre>";
}

function redirect($url){
    if($url)
    {
      return header('location:'. $url);
    }else{
        return "Can't redirect";
        exit;
    };
}
?>