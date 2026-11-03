<?php
include("conexion.php");

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
    <tr><th colspan="2">Agregar Reserva</th></tr>
    <tr>
    <td><b>Id User: </b></td>
    <td><select name="id_user" type="number">
            <?php

$qrdrivers = mysqli_query($conn, "SELECT * FROM  drivers");
while($mostrarcat = mysqli_fetch_array($qrdrivers))
{
    echo '<option value= "'.$mostrarcat['id_driver'].'">'.$mostrarcat['name_d']. '</option>';
}
?>
</select>
</td>
</tr>

<tr>
    <td><b>Descripcion: </b></td>
    <td><input type="text" name="descripcion" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Fecha: </b></td>
    <td><input type="text" name="fecha" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<

<td colspan="2" >
<?php echo "<a class= 'BotonesTeam' href=\"/PAGINAS/perfil_conductor2.html\">Cancelar</a>";?>&nbsp;
<input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar esta reserva?');">
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
    $proidu  = $_POST['id_user'];
    $prodes  = $_POST['descripcion'];
    $profec  = $_POST['fecha'];


    mysqli_query($conn, "INSERT INTO reservations(id_user,description_reser,date_reser)
    values ('$proidu','$prodes','$profec')");
    echo "<script>alert('Reserva registrado con exito:  $prodes'); window.location='../PAGINAS/perfil_conductor2.html' </script>";
}
?>