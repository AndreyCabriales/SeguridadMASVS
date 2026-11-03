<?php
include("conexion.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM drivers WHERE id_driver ='$id'");
header("Location:drivers_tabla.php?pag=$pagina");

?>