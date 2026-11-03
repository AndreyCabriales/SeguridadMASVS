<?php
include("conexion.php");
include("drivers_tabla.php");
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
    <tr><th colspan="2">Agregar Conductor</th></tr>
    <tr>
        <td><b>Nombre: </b></td>
        <td><input type="text" name="nombre" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Apellido: </b></td>
    <td><input type="text" name="apellido" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Edad: </b></td>
    <td><input type="text" name="edad" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr>
    <td><b>Email: </b></td>
    <td><input type="email" name="email" autocomplete="off" class="CajaTexto" step="any"></td>
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
    <td><b>Licencia: </b></td>
    <td><input type="text" name="licencia" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>

<tr>

<td colspan="2" >
<?php echo "<a class= 'BotonesTeam' href=\"drivers_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este conductor?');">
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
    $proeda  = $_POST['edad'];
    $proema  = $_POST['email'];
    $procon  = $_POST['contraseña'];
    $protel  = $_POST['telefono'];
    $prolic  = $_POST['licencia'];

    mysqli_query($conn, "INSERT INTO drivers(name_d,lastname_d,age,email_d,password_d,phone_d,license)
    values ('$pronom','$proape','$proeda','$proema','$procon','$protel','$prolic')");
    echo "<script>alert('Conductor registrado con exito:  $pronom'); window.location='drivers_tabla.php' </script>";
}
?>