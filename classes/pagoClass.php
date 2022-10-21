<?php

namespace App;

class Pago {
    // Base DE DATOS
    protected static $tabla = 'pagoTable';
    protected static $columnasDB = ['id', 'mediodepago', 'valordepago', 'descripcion'];

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
        $this->fecha = date('Y/m/d');

        //debuguear($array);  
    }

    public function guardar() {

        $query = "INSERT INTO pago (id, mediodepago, valordepago, descripcion, fecha) 
        VALUES ('$this->id', '$this->mediodepago', '$this->valordepago', '$this->descripcion', '$this->fecha') "; 
        
        debuguear($query);  
    }

}