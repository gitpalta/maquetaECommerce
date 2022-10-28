<?php

namespace App;

class Pago extends Padre 
{

    // Propiedades
    public $id;
    public $referencia;
    public $valordepago;
    public $descripcion;
    public $fecha;
    public $table;

    public function __construct($array = [])
    {
        $this->referencia = 0;
        $this->valordepago = $array['valordepago'] ?? '';
        $this->descripcion = $array['descripcion'] ?? '';
        $this->fecha = date('Y/m/d h:i:s');

        //debuguear($this->referencia);  
    }

    public function guardar() {

        //Ver cómo traer a atributos la id de la bd
        
        $query = "INSERT INTO pago (referencia, valordepago, descripcion, fecha) 
        VALUES ('$this->referencia', '$this->valordepago', '$this->descripcion', '$this->fecha') "; 

        //debuguear($query);
        self::$db->query($query);
        //$resultado = self::$db->query($query);

    }

    public function addData($table){

        $arrayTable = self::consulta($table);
        //debuguear($arrayTable);
   
        $newTable = array
        (
            $this->referencia = $arrayTable["referencia"],
            $this->valordepago = floatval($arrayTable["valordepago"]),
            $this->descripcion = $arrayTable["descripcion"],
        );
        //debuguear($newTable[1]);
        return $newTable;
    }

    //pendiente sanitizar entradas
}   
