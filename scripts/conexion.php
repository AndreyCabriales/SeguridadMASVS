<?php
require_once(__DIR__ . '/security_headers.php');

/**
 * MASVS-RESILIENCE: Manejo seguro de errores y ocultamiento de fallos internos.
 * Desactiva la exposición de trazas y nombres de BD al usuario y los registra en log.
 */
error_reporting(0);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'gotaxi';

$conn = @mysqli_connect($host, $nom, $pass, $db);

if(!$conn)
{
    // Registro interno para administradores (sin exponer al cliente)
    error_log("[GoTaxi Security] Error de conexión a Base de Datos: " . mysqli_connect_error());
    http_response_code(503);
    die("<div style='font-family:sans-serif; text-align:center; padding:50px;'><h2>Servicio temporalmente no disponible</h2><p>Estamos trabajando para resolver el inconveniente. Intente nuevamente en unos minutos.</p></div>");
}
?>
