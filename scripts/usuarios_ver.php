<?php
include("conexion.php");
include("usuarios_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $proid = $mostrar['id_user'];
    $pronom = $mostrar['name_u'];
    $proape = $mostrar['lastname_u'];
    $proema = $mostrar['email_u'];
        $protel = $mostrar['phone_u'];
}
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