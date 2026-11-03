<?php
/**
 * MASVS-AUTH: Destrucción segura de sesión y revocación de cookies
 */
session_start();
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
header("Location: ../PAGINAS/PaginaWebIniciarSesion.html?msg=logged_out");
exit();
?>
