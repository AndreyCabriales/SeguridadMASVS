<?php
include("conexion.php");
include("taxis_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM taxis WHERE id_taxi = '$id'");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
    $proid = $mostrar['id_taxi'];
    $proidd = $mostrar['id_driver'];
    $pronum = $mostrar['number_t'];
    $propla = $mostrar['plate'];
    $proest = $mostrar['state'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar Conductor</th></tr>   
<tr>
<td><b>Id: </b></td>
<td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid;?>" readonly></td>
</tr>
<tr>
<td><b>Id Conductor: </b></td>
<td><input class="CajaTexto" type="number" name="txtidd" value="<?php echo $proidd;?>" required></td>
</tr>
<tr>
<td><b>Numero: </b></td>
<td><input class="CajaTexto" type="text" name="txtnum" value="<?php echo $pronum;?>" required></td>
</tr>
<tr>
<td><b>Placa: </b></td>
<td><input class="CajaTexto" type="text" name="txtpla" value="<?php echo $propla;?>" required></td>
</tr>
<tr>
<td><b>Estado: </b></td>
<td><input class="CajaTexto" type="boolean" name="txtest" value="<?php echo $proest;?>" required ></td>
</tr>
<tr>



</select>
</td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"taxis_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este taxi?');">
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
    $proid1 = $_POST['txtid'];
    $proidd1 = $_POST['txtidd'];
    $pronum1 = $_POST['txtnum'];
    $propla1 = $_POST['txtpla'];
    $proest1 = $_POST['txtest'];

    
$querymodificar = mysqli_query($conn, "UPDATE taxis SET id_driver='$proidd1',number_t='$pronum1',plate='$propla1',state='$proesta1'");
echo "<script>window.location= 'taxis_tabla.php?pag=$pagina' </script>";
  
}
?>