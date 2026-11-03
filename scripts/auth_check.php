<?php
/**
 * MASVS-AUTH: Guardia de autenticación para control de acceso y sesiones.
 * Previene navegación forzada y acceso no autorizado a funciones administrativas.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuarioingresando']) || empty($_SESSION['usuarioingresando'])) {
    header("Location: ../PAGINAS/PaginaWebIniciarSesion.html?auth=required");
    exit();
}
?>
