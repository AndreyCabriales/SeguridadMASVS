<?php
/**
 * MASVS-RESILIENCE: Conexión orientada a objetos con control de excepciones silencioso
 */
error_reporting(0);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

class Conexion {
    public $conn;
    
    public function __construct()
    {
    }

    public function conectar(){
        try {
            $this->conn = @new mysqli('localhost', 'root', '', 'gotaxi');
            if($this->conn->connect_errno){
                error_log("[GoTaxi] Fallo al conectar MySQLi: " . $this->conn->connect_error);
                return null;
            }
        } catch (Exception $e) {
            error_log("[GoTaxi Exception] " . $e->getMessage());
            return null;
        }
        return $this->conn;
    }
}
?>
