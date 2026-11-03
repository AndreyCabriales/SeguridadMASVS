<?php
require_once('auth_check.php');
include("conexion.php");
include("usuarios_tabla.php");

$pagina = intval($_GET['pag'] ?? 1);
$id = intval($_GET['id'] ?? 0);

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id_user = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$proid = $pronom = $proape = $proema = $protel = "";
if($mostrar = mysqli_fetch_array($res))
{  
   $proid  = htmlspecialchars($mostrar['id_user'], ENT_QUOTES, 'UTF-8');
   $pronom = htmlspecialchars($mostrar['name_u'], ENT_QUOTES, 'UTF-8');
   $proape = htmlspecialchars($mostrar['lastname_u'], ENT_QUOTES, 'UTF-8');
   $proema = htmlspecialchars($mostrar['email_u'], ENT_QUOTES, 'UTF-8');
   $protel = htmlspecialchars($mostrar['phone_u'], ENT_QUOTES, 'UTF-8');
}
mysqli_stmt_close($stmt);
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
<td><input class="CajaTexto" type="email" name="txtema" value="<?php echo $proema;?>" required ></td>
</tr>
<tr>
<td><b>Tel: </b></td>
<td><input class="CajaTexto" type="text" name="txttel" value="<?php echo $protel;?>" required ></td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href="usuarios_tabla.php?pag=$pagina">Cancelar</a>";?>&nbsp;
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
    $proid1  = intval($_POST['txtid']);
    $pronom1 = trim($_POST['txtnom']);
    $proape1 = trim($_POST['txtape']);
    $proema1 = trim($_POST['txtema']);
    $protel1 = trim($_POST['txttel']);
     
    $stmtMod = mysqli_prepare($conn, "UPDATE users SET name_u=?, lastname_u=?, email_u=?, phone_u=? WHERE id_user = ?");
    mysqli_stmt_bind_param($stmtMod, "ssssi", $pronom1, $proape1, $proema1, $protel1, $proid1);
    mysqli_stmt_execute($stmtMod);
    mysqli_stmt_close($stmtMod);

    echo "<script>window.location= 'usuarios_tabla.php?pag=$pagina'; </script>";
}
?>
