<?php
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
                    <tr><th colspan="2">Ver Conductor</th></tr>
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
    <td><b>Edad: </b></td>
    <td><?php echo $proeda;?></td>
</tr>
<tr>
    <td><b>Email: </b></td>
    <td><?php echo $proema;?></td>
</tr>
<tr>
    <td><b>Contraseña: <b></td>
    <td><?php echo $procon;?></td>
</tr>
<tr>
    <td><b>Telefono: <b></td>
    <td><?php echo $protel;?></td>
</tr>
<tr>
    <td><b>Licencia: </b></td>
    <td><?php echo $prolic;?></td>
</tr>

<tr>

<td colspan="2">
    <?php echo "<a class='BotonesTeam' href=\"drivers_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>