<?php

namespace App;

class Pago extends Padre {

    // Propiedades
    public $id;
    public $mediodepago;
    public $valordepago;
    public $descripcion;
    public $fecha;

    public function __construct($array = [])
    {
        $this->id = $array['id'] ?? NULL ; // ?? '' placeholder
        $this->mediodepago = $array['mediodepago'] ?? '';
        $this->valordepago = $array['valordepago'] ?? '';
        $this->descripcion = $array['descripcion'] ?? '';
        $this->fecha = date('Y/m/d h:i:s');

        //debuguear($array);  
    }

    public function guardar() {

        //Ver cómo traer a atributos la id de la bd
        
        $query = "INSERT INTO pago (mediodepago, valordepago, descripcion, fecha) 
        VALUES ('$this->mediodepago', '$this->valordepago', '$this->descripcion', '$this->fecha') "; 

        self::$db->query($query);
        //$resultado = self::$db->query($query);

        //debuguear($resultado);
    }

    //pendiente sanitizar entradas
}   
