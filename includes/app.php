<?php 

// Archivo Principal

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require 'classes/padreClass.php';
require 'classes/pagoClass.php';
require 'classes/customerClass.php';
require 'classes/curlClass.php';

use App\Padre;


$db = conectarDB();

Padre::setDB($db);