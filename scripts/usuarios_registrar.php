<?php
include("conexion.php");
include("usuarios_tabla.php");
$pagina = $_GET['pag'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
</head>
    <body>
        <div class="caja_popup2">
            <form method="POST" class="contenedor_popup">
<table>
    <tr><th colspan="2">Agregar Usuario</th></tr>
    <tr>
        <td><b>Nombre: </b></td>
        <td><input type="text" name="nombre" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Apellido: </b></td>
    <td><input type="text" name="apellido" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Email: </b></td>
    <td><input type="text" name="email" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr>
    <td><b>Contraseña: </b></td>
    <td><input type="password" name="contraseña" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr>
    <td><b>Telefono: </b></td>
    <td><input type="text" name="telefono" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>

<tr>

<td colspan="2" >
<?php echo "<a class= 'BotonesTeam' href=\"usuarios_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este usuario?');">
</td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['btnregistrar']))
{
    $pronom  = $_POST['nombre'];
    $proape  = $_POST['apellido'];
    $proema  = $_POST['email'];
    $procon = $_POST['contraseña'];
    $protel  = $_POST['telefono'];

    mysqli_query($conn, "INSERT INTO users(name_u,lastname_u,email_u,password_u,phone_u)
    values ('$pronom','$proape','$proema',md5('$procon'),'$protel')");
    echo "<script>alert('Usuario registrado con exito:  $pronom'); window.location='usuarios_tabla.php' </script>";
}
?>