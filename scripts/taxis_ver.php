<?php
include("conexion.php");
include("usuarios_tabla.php");
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
                    <tr><th colspan="2">Ver Taxi</th></tr>
                    <tr>
                        <td><b>Id:</b></td>
                        <td><?php echo $proid;?></td>
</tr>
<tr>
    <td><b>Id Conductor: </b></td>
    <td><?php echo $proidd;?></td>
</tr>
<tr>
    <td><b>Numero: </b></td>

    <td><?php echo $pronum;?></td>
</tr>
<tr>
    <td><b>Placa: </b></td>
    <td><?php echo $propla;?></td>
</tr>
<tr>
    <td><b>Estado: <b></td>
    <td><?php echo $proest;?></td>
</tr>

<tr>

<td colspan="2">
    <?php echo "<a class='BotonesTeam' href=\"taxis_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>