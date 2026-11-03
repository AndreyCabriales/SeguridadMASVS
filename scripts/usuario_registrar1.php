<?php
include("conexion.php");

$id = $_SESSION['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM users WHERE id_user=$id");
while($mostrar = mysqli_fetch_array($querybuscar))
{  
   $proid      = $mostrar['id_user'];
   $pronom     = $mostrar['name_u'];
   $proape     = $mostrar['lastname_u'];
   $proema     = $mostrar['email_u'];
   $protel     = $mostrar['phone_u'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar usuario</th></tr>   
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
<td><b>Email: </b></td>
<td><input class="CajaTexto" type="text" name="txtema" value="<?php echo $proema;?>" required ></td>
</tr>
<tr>
<td><b>Tel: </b></td>
<td><input class="CajaTexto" type="text" name="txttel" value="<?php echo $protel;?>" required ></td>
</tr>



</select>
</td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"../PAGINAS/PaginaWebPerfil.html\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este usuario?');">
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
   $proid1     = $_POST['txtid'];
   $pronom1    = $_POST['txtnom'];
   $proape1    = $_POST['txtape'];
   $proema1    = $_POST['txtema'];
   $protel1    = $_POST['txttel'];
    
$querymodificar = mysqli_query($conn, "UPDATE users SET name_u='$pronom1',lastname_u='$proape1',email_u='$proema1',phone_u='$protel1' WHERE id_user = '$proid1'");
echo "<script>window.location= '../PAGINAS/PaginaWebPerfil.html' </script>";
  
}
?>




