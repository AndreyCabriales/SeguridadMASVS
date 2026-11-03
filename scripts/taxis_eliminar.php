<?php
include("conexion.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM taxis WHERE id_taxi ='$id'");
header("Location:taxis_tabla.php?pag=$pagina");

?>