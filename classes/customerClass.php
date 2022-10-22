<?php

namespace App;

class Customer extends Padre{

    public $id;
    public $email;
    public $nombre;
    public $identificacion;

    public function __construct($array = [])
    {
        $this->id = $array['id'] ?? NULL ;
        $this->email = $array['email'] ?? '';
        $this->nombre = $array['nombre'] ?? '';
        $this->identificacion = $array['identificacion'] ?? '';

        //debuguear($array);  
    }

    public function guardar() {

        //Ver cómo traer a atributos la id de la bd
        
        $query = "INSERT INTO customer (email, nombre, identificacion)
        VALUES ('$this->email', '$this->nombre', '$this->identificacion')"; 

        //debuguear($query);

        self::$db->query($query);
        //$resultado = self::$db->query($query);

        //debuguear($resultado);
    }

    //pendiente sanitizar entradas
}   