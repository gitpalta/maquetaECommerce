<?php

namespace App;

class Customer extends Padre
{

    public $id;
    public $email;
    public $nombre;
    public $identificacion;
    public $table;

    public function __construct($array = [])
    {
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

    public function addData($table){

        $customerTable = self::consulta($table);
        //debuguearNoExit($customerTable);
   
        $newTable = array
        (
            $this->email = $customerTable["email"] ,
            $this->nombre = $customerTable["nombre"] ,
            $this->identificacion = $customerTable["identificacion"],
        ); 
        //debuguear($this->email);
        return $newTable;
        $newTable=[''];
    }
    //pendiente sanitizar entradas
}   