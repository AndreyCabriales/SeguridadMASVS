<?php
include("conexion.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id_user ='$id'");
header("Location:usuarios_tabla.php?pag=$pagina");

?>