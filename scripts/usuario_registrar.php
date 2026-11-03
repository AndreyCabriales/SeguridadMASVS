<?php
include('conexion.php');

$nombre = $_POST["nombre"];
$correo = $_POST["email"];
$pass   = md5($_POST["contraseña"]);

$insertarusu = mysqli_query($conn,"INSERT INTO users(name_u,email_u,password_u) VALUES ('$nombre','$correo','$pass')");

if(!$insertarusu)
{
    echo "<script> alert('Correo duplicado, intenta con otro correo');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
}else if($nombre=="" || $correo=="" || $pass==""){
    echo "<script> alert('Debe insertar todos los datos');window.location='../PAGINAS/PaginaWebRegistrarse.html'; </script>";
}
else
{
    echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='../PAGINAS/PaginaWebIniciarSesion.html' </script>";
}

?>