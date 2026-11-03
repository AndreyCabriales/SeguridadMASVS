<?php
include('conexion.php');

$nombre = $_POST["nombre"] ?? '';
$correo = $_POST["email"] ?? '';
$pass_raw = $_POST["contraseña"] ?? '';

if(empty($nombre) || empty($correo) || empty($pass_raw)){
    echo "<script> alert('Debe insertar todos los datos');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
    exit();
}

// Criptografía moderna: hashing seguro con BCRYPT y salt automático
$pass = password_hash($pass_raw, PASSWORD_BCRYPT);

$insertarusu = mysqli_query($conn,"INSERT INTO users(name_u,email_u,password_u) VALUES ('$nombre','$correo','$pass')");

if(!$insertarusu)
{
    echo "<script> alert('Correo duplicado, intenta con otro correo');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
}
else
{
    echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='../PAGINAS/PaginaWebIniciarSesion.html' </script>";
}
?>
