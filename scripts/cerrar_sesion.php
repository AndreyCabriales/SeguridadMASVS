<?php
session_start();
session_destroy();
header("Location:../PAGINAS/PaginaWebIniciarSesion.html");
exit;
?>