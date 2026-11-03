<?php
include("conexion.php");
include("taxis_tabla.php");
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
    <tr><th colspan="2">Agregar Taxi</th></tr>
    <tr>
    <td><b>Id Conductor: </b></td>
    <td><select name="id_driver" type="number">
            <?php

$qrcategoria = mysqli_query($conn, "SELECT * FROM  drivers");
while($mostrarcat = mysqli_fetch_array($qrcategoria))
{
    echo '<option value= "'.$mostrarcat['id_driver'].'">'.$mostrarcat['name_d']. '</option>';
}
?>
</select>
</td>
</tr>
<tr>
    <td><b>Numero: </b></td>
    <td><input type="number" name="numero" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr>
    <td><b>Placa: </b></td>
    <td><input type="text" name="placa" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr>
    <td><b>Estado: </b></td>
    <td><input type="boolean" name="estado" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>



<tr>

<td colspan="2" >
<?php echo "<a class= 'BotonesTeam' href=\"taxis_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input type="submit" class="BotonesTeam" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este taxi?');">
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
    $proidd  = $_POST['id_driver'];
    $pronum  = $_POST['numero'];
    $propla  = $_POST['placa'];
    $proest  = $_POST['estado'];

    mysqli_query($conn, "INSERT INTO taxis(id_driver,number_t,plate,state)
    values ('$proidd','$pronum','$propla','$proest')");
    echo "<script>alert('Taxi registrado con exito:  $pronom'); window.location='taxis_tabla.php' </script>";
}
?>