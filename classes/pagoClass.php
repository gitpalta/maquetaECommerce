<?php

namespace App;

class Pago extends Padre 
{

    // Propiedades
    public $id;
    public $mediodepago;
    public $valordepago;
    public $descripcion;
    public $fecha;
    public $table;

    public function __construct($array = [])
    {
        $this->mediodepago = $array['mediodepago'] ?? '';
        $this->valordepago = $array['valordepago'] ?? '';
        $this->descripcion = $array['descripcion'] ?? '';
        $this->fecha = date('Y/m/d h:i:s');

        //debuguear($this->mediodepago);  
    }

    public function guardar() {

        //Ver cómo traer a atributos la id de la bd
        
        $query = "INSERT INTO pago (mediodepago, valordepago, descripcion, fecha) 
        VALUES ('$this->mediodepago', '$this->valordepago', '$this->descripcion', '$this->fecha') "; 

        self::$db->query($query);
        //$resultado = self::$db->query($query);

        //debuguear(floatval($this->valordepago));
    }

    public function addData($table){

        $arrayTable = self::consulta($table);
        //debuguear($arrayTable);
   
        $newTable = array
        (
            $this->mediodepago = $arrayTable["mediodepago"],
            $this->valordepago = floatval($arrayTable["valordepago"]),
            $this->descripcion = $arrayTable["descripcion"],
        );
        //debuguear($newTable[1]);
        return $newTable;
    }

    //pendiente sanitizar entradas
}   
