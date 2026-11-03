<?php
session_start();
include('conexion.php');

$correo = $_POST["email"];
$pass   = md5($_POST["contraseña"]);


$buscandousu = mysqli_query($conn, "SELECT * FROM users WHERE email_u = '".$correo."' and password_u = '".$pass."'");
$nr = mysqli_num_rows($buscandousu);

if($nr == 1)
{
    $_SESSION['usuarioingresando']=$correo;
    header("Location:../PAGINAS/PaginaWeb1.php");
}
else if ($nr == 0)
{
    echo "<script> alert('Usuario no existe');window.location= 'usuario_login.php' </script>";
}
?>