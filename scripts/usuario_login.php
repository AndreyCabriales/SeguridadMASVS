<?php
session_start();
include('conexion.php');

$correo = $_POST["email"] ?? '';
$pass_raw = $_POST["contraseña"] ?? '';

$buscandousu = mysqli_query($conn, "SELECT * FROM users WHERE email_u = '".$correo."'");
$usuario = mysqli_fetch_assoc($buscandousu);

$autenticado = false;

if ($usuario) {
    $hash_guardado = $usuario['password_u'];
    // 1. Verificación segura moderna con bcrypt
    if (password_verify($pass_raw, $hash_guardado)) {
        $autenticado = true;
    }
    // 2. Compatibilidad con credenciales heredadas (md5 o plano) y rehasheo automático
    else if ($hash_guardado === md5($pass_raw) || $hash_guardado === $pass_raw) {
        $autenticado = true;
        $nuevo_hash = password_hash($pass_raw, PASSWORD_BCRYPT);
        mysqli_query($conn, "UPDATE users SET password_u = '".$nuevo_hash."' WHERE id_user = ".$usuario['id_user']);
    }
}

if ($autenticado) {
    $_SESSION['usuarioingresando'] = $correo;
    header("Location:../PAGINAS/PaginaWeb1.php");
    exit();
} else {
    echo "<script> alert('Usuario o contraseña incorrectos');window.location= '../PAGINAS/PaginaWebIniciarSesion.html' </script>";
}
?>
