<?php
/**
 * MASVS-PRIVACY: Helper para minimización y enmascaramiento de datos personales.
 * Protege números telefónicos y datos sensibles de clientes y conductores contra robo de identidad.
 */
function enmascarar_telefono($telefono) {
    $str = trim(strval($telefono));
    $len = strlen($str);
    if ($len <= 4) {
        return "****";
    }
    return str_repeat("*", $len - 4) . substr($str, -4);
}

function enmascarar_email($email) {
    $partes = explode('@', $email);
    if (count($partes) !== 2) return $email;
    $nombre = $partes[0];
    $dominio = $partes[1];
    $nombreEnm = substr($nombre, 0, 2) . str_repeat('*', max(1, strlen($nombre) - 2));
    return $nombreEnm . '@' . $dominio;
}
?>
