<?php

namespace App;

class Padre {
        // Base DE DATOS
        protected static $db;

        public static function setDB($database) {
            self::$db = $database;
        }
}