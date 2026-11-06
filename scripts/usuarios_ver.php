<?php
require_once('auth_check.php');
require_once('privacy_helper.php');
include("conexion.php");
include("usuarios_tabla.php");
$pagina = intval($_GET['pag'] ?? 1);
$id = intval($_GET['id'] ?? 0);

$stmt = mysqli_prepare($conn, "SELECT id_user, name_u, lastname_u, email_u, phone_u FROM users WHERE id_user = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$proid = $pronom = $proape = $proema = $protel = "";
if($mostrar = mysqli_fetch_array($resultado))
{
    $proid = htmlspecialchars($mostrar['id_user'], ENT_QUOTES, 'UTF-8');
    $pronom = htmlspecialchars($mostrar['name_u'], ENT_QUOTES, 'UTF-8');
    $proape = htmlspecialchars($mostrar['lastname_u'], ENT_QUOTES, 'UTF-8');
    $proema = htmlspecialchars($mostrar['email_u'], ENT_QUOTES, 'UTF-8');
    $protel = htmlspecialchars(enmascarar_telefono($mostrar['phone_u']), ENT_QUOTES, 'UTF-8');
}
mysqli_stmt_close($stmt);
?>

<html>
    <body>
        <div class="caja_popup2">
            <form class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Ver usuario</th></tr>
                    <tr>
                        <td><b>Id:</b></td>
                        <td><?php echo $proid;?></td>
</tr>
<tr>
    <td><b>Nombre: </b></td>
    <td><?php echo $pronom;?></td>
</tr>
<tr>
    <td><b>Apellido: </b></td>
    <td><?php echo $proape;?></td>
</tr>
<tr>
    <td><b>Email: </b></td>
    <td><?php echo $proema;?></td>
</tr>
<tr>
    <td><b>Telefono: <b></td>
    <td><?php echo $protel;?></td>
</tr>

<tr>

<td colspan="2">
    <?php echo "<a class='BotonesTeam' href=\"usuarios_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>
