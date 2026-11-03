<?php
include('conexion.php');

$nombre = trim($_POST["nombre"] ?? '');
$correo = trim($_POST["email"] ?? '');
$pass_raw = $_POST["contraseña"] ?? '';

if(empty($nombre) || empty($correo) || empty($pass_raw)){
    echo "<script> alert('Debe insertar todos los datos');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
    exit();
}

if (!isset($_POST['politica_privacidad'])) {
    echo "<script> alert('Debe aceptar el Aviso de Privacidad para continuar');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
    exit();
}
    echo "<script> alert('Debe insertar todos los datos');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
    exit();
}

// MASVS-CRYPTO: Hashing con BCRYPT
$pass = password_hash($pass_raw, PASSWORD_BCRYPT);

// MASVS-CODE: Consulta preparada
$stmt = mysqli_prepare($conn, "INSERT INTO users(name_u, email_u, password_u) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $pass);
$resultado = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if(!$resultado)
{
    echo "<script> alert('Correo duplicado o error al registrar');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
}
else
{
    $nombreSeguro = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    echo "<script> alert('Usuario registrado con exito: $nombreSeguro'); window.location='../PAGINAS/PaginaWebIniciarSesion.html'; </script>";
}
?>
