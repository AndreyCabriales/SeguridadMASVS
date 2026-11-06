<?php
require_once('auth_check.php');
include("conexion.php");
include("drivers_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM drivers WHERE id_driver = '$id'");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
    $proid = $mostrar['id_driver'];
    $pronom = $mostrar['name_d'];
    $proape = $mostrar['lastname_d'];
    $proeda = $mostrar['age'];
    $proema = $mostrar['email_d'];
    $procon = $mostrar['password_d'];
    $protel = $mostrar['phone_d'];
    $prolic = $mostrar['license'];
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
<td><b>Nombre: </b></td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom;?>" required></td>
</tr>
<tr>
<td><b>Apellido: </b></td>
<td><input class="CajaTexto" type="text" name="txtape" value="<?php echo $proape;?>" required></td>
</tr>
<tr>
<td><b>Edad: </b></td>
<td><input class="CajaTexto" type="text" name="txteda" value="<?php echo $proeda;?>" required></td>
</tr>
<tr>
<td><b>Email: </b></td>
<td><input class="CajaTexto" type="email" name="txtema" value="<?php echo $proema;?>" required ></td>
</tr>
<tr>
<td><b>Contraseña: </b></td>
<td><input class="CajaTexto" type="text" name="txtcon" value="<?php echo $procon;?>" required></td>
</tr>
<tr>
<td><b>Telefono: </b></td>
<td><input class="CajaTexto" type="text" name="txttel" value="<?php echo $protel;?>" required ></td>
</tr>
<tr>
<td><b>Licencia: </b></td>
<td><input class="CajaTexto" type="text" name="txtlic" value="<?php echo $prolic;?>" required></td>
</tr>



</select>
</td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"drivers_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este conductor?');">
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
    $pronom1 = $_POST['txtnom'];
    $proape1 = $_POST['txtape'];
    $proeda1 = $_POST['txteda'];
    $proema1 = $_POST['txtema'];
    $procon1 = $_POST['txtcon'];
    $protel1 = $_POST['txttel'];
    $prolic1 = $_POST['txtlic'];
    
$querymodificar = mysqli_query($conn, "UPDATE drivers SET name_d='$pronom1',lastname_d='$proape1',age='$proeda1', email_d='$proema1', password_d='$procon1',phone_d='$protel1',license='$prolic1' WHERE id_driver = '$proid1'");
echo "<script>window.location= 'drivers_tabla.php?pag=$pagina' </script>";
  
}
?>