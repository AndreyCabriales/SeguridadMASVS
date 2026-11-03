<?php
/**
 * MASVS-NETWORK: Configuración de seguridad en transporte y cabeceras HTTP.
 * Aplica banderas seguras en cookies de sesión y mitigación de Clickjacking / MIME-sniffing.
 */
if (session_status() === PHP_SESSION_NONE) {
    // Configuración segura de cookies de sesión
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => $cookieParams['lifetime'],
        'path'     => '/',
        'domain'   => $cookieParams['domain'],
        'secure'   => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}

// Cabeceras de protección de red y navegador
if (!headers_sent()) {
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: SAMEORIGIN");
    header("Referrer-Policy: strict-origin-when-cross-origin");
    header("X-XSS-Protection: 1; mode=block");
    header("Permissions-Policy: camera=(), microphone=()");
}
?>
