<?php

namespace App;

class Padre 
{
        // Base DE DATOS
        protected static $db;

        public static function setDB($database) {
            self::$db = $database;
        }
        
        // para obtener id desde la bd
        // public function obtenerId(){
        //     $db = self::$db;
        //     //debuguearNoExit($db);
        //     if (self::$db) {
        //         $lastId = $db->insert_id;
        //     }
        //     debuguear($lastId);
        //     return $lastId;
        // }

        public function obtenerId(){
            $db = self::$db;
            $query = "SELECT LAST_INSERT_ID()";
            $result = mysqli_query($db, $query);
            if($result)
            {
                $dataArray = mysqli_fetch_assoc($result);
            } else {
                echo "No id";
            }
            //debuguear($dataArray["LAST_INSERT_ID()"]);
            return $dataArray["LAST_INSERT_ID()"];
        }
        
        public function consulta($table){

            //$this->id= self::obtenerId();
            $this->id= self::obtenerId();

            $query = "SELECT * FROM $table WHERE id = $this->id";

            $result = mysqli_query(self::$db, $query);
            $dataArray = mysqli_fetch_assoc($result);
            if(isset($dataArray['$table']))
            {
                $this->id=$dataArray['table'];
            }
            //debuguearNoExit($dataArray);
            return $dataArray;
        }
}