<?php
require_once('auth_check.php');
include('conexion.php');
?>
<html>
<title>Usuarios</title>
<body>
<div class="ContenedorPrincipal">  
<?php
$filasmax = 7;
if (isset($_GET['pag']))
   {
       $pagina = $_GET['pag'];
   } else
   {
       $pagina = 1;
   }
if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];

$sqlusu = mysqli_query($conn, "SELECT * FROM taxis where number_t like '".$buscar."%'");

}
else
{
$sqlusu = mysqli_query($conn, "SELECT * FROM taxis ORDER BY id_taxi ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
   $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_taxis FROM taxis");
   $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_taxis'];
  
   ?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../estilos/PaginaWebUsuarios_tabla.css">
   <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #CF6754 ;">
            <a class="nav-brand"><img src="../img/Logo.png" style="height:120px; width:90px;" id="img1"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item-active">
                        <a class="nav-link" href="../PAGINAS/PaginaWeb.html">Inicio<span ></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PAGINAS/PaginaWebTaxis.html"> Taxis</a>
                    </li>
                    <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown">
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="../PAGINAS/PaginaWebPerfil.html">Perfil</a></li>
                          <hr>
                          <li><a class="dropdown-item" href="../PAGINAS/PaginaWebNosotros.html">Sobre Nosotros</a></li>
                          <hr>
                          <li><a class="dropdown-item" href="../PAGINAS/PaginaWebFAQ´s.html">FAQ´s</a></li>
                        </ul>
                      </div>
                      <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Modificar
                    </a>
                    <div class="dropdown">
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="../scripts/usuarios_tabla.php">Usuarios</a></li>
                          <hr>
                          <li><a class="dropdown-item" href="../scripts/drivers_tabla.php">Conductores</a></li>
                          <hr>
                          <li><a class="dropdown-item" href="../scripts/taxis_tabla.php">Taxis</a></li>
                        </ul>
                      </div>
                </ul>
                </ul>
                
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   <div class="ContenedorTabla">
   <form method="POST">
   <h1>Lista de Taxis</h1>
  
   <div class="ContBuscar">
   <div style="float: left;">
   <a href="taxis_tabla.php" class="BotonesTeam">Inicio</a>
   <input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
   <input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresa el numero de un taxi" autocomplete="off" >
   </div>
   <div style="float:right;">
   <?php echo "<a class='BotonesTeam5' href=\"taxis_registrar.php?pag=$pagina\">Agregar Taxi</a>";?>
   </div>
   </div>
           </form>
   <table>
           <tr>
           <th>Id</th>
           <th>Conductor</th>
           <th>Numero</th>
           <th>Placa</th>
           <th>Estado</th>
           <th>Modificadores</th>
           </tr>
       <?php
       while ($mostrar = mysqli_fetch_assoc($sqlusu))
       {
          
           echo "<tr>";
           echo "<td>".$mostrar['id_taxi']."</td>";
           echo "<td>".$mostrar['id_driver']."</td>";
           echo "<td>".$mostrar['number_t']."</td>";
           echo "<td>".$mostrar['plate']."</td>";
           echo "<td>".$mostrar['state']."</td>";
           echo "<td style='width:24%'>
           <a class='BotonesTeam1' href=\"taxis_ver.php?id=$mostrar[id_taxi]&pag=$pagina\">&#x1F50D;</a>
           <a class='BotonesTeam2' href=\"taxis_modificar.php?id=$mostrar[id_taxi]&pag=$pagina\">&#128397;</a>
           <a class='BotonesTeam3' href=\"taxis_eliminar.php?id=$mostrar[id_taxi]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el taxi $mostrar[number_t]?')\">&#10006;</a>
           </td>"; 
          
       }
       ?>
   </table>
   <div style='text-align:right'>
   <br>
   <?php echo "Total de Taxis: ".$maxusutabla;?>
   </div>
   </div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
?>
<a class="BotonesTeam4" href="taxis_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
<?php
}
else
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
?>
<?php
}
else
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
if (isset($_GET['pag'])) {
if ((($pagina) * $filasmax) < $maxusutabla) {
?>
<a class="BotonesTeam4" href="taxis_tabla.php?pag=<?php echo $_GET['pag'] + 2; ?>">Siguiente</a>
<?php
} else {
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
<?php
}
?>
<?php
} else {
?>
<a class="BotonesTeam4" href="taxis_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivery.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
