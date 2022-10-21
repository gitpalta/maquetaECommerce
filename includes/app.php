<?php 

// Archivo Principal

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require 'classes/pagoClass.php';

use App\Pago;

$db = conectarDB();

Pago::setDB($db);