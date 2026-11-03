<?php
require_once('auth_check.php');
require_once('csrf_helper.php');
include("conexion.php");

$pagina = intval($_GET['pag'] ?? 1);
$id = intval($_GET['id'] ?? 0);
$token = $_GET['csrf_token'] ?? $_POST['csrf_token'] ?? '';

if (!validar_csrf($token) || $id <= 0) {
    http_response_code(403);
    die("Acción bloqueada: Solicitud rechazada por falta de token CSRF válido.");
}

$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id_user = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: usuarios_tabla.php?pag=$pagina");
exit();
?>
