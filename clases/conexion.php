<?php

    class Conexion{
       public $conn;
       
       public function __construct()
       {
       }

       public function conectar(){
        $this->conn=new mysqli('localhost','root','','gotaxi');
            if($this->conn->connect_errno){
               echo 'Conexión fallida '.$this->conn->error;
            }else{
                echo 'conexión realizada!!';
            }
        return $this->conn;
       }
       
    }

    //$c=new Conexion();


?>