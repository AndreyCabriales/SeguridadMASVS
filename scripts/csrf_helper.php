<?php
/**
 * MASVS-PLATFORM: Mitigación de Cross-Site Request Forgery (CSRF).
 * Genera y valida tokens aleatorios criptográficamente seguros por sesión.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function obtener_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validar_csrf($token) {
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}
?>
