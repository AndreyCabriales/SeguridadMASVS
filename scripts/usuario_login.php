<?php
session_start();
include('conexion.php');

$correo = trim($_POST["email"] ?? '');
$pass_raw = $_POST["contraseña"] ?? '';

if (empty($correo) || empty($pass_raw)) {
    echo "<script> alert('Por favor complete todos los campos'); window.location= '../PAGINAS/PaginaWebIniciarSesion.html'; </script>";
    exit();
}

// MASVS-CODE: Consulta preparada para mitigar inyecciones SQL
$stmt = mysqli_prepare($conn, "SELECT id_user, name_u, email_u, password_u FROM users WHERE email_u = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

$autenticado = false;

if ($usuario) {
    $hash_guardado = $usuario['password_u'];
    // 1. Verificación segura moderna con bcrypt
    if (password_verify($pass_raw, $hash_guardado)) {
        $autenticado = true;
    }
    // 2. Compatibilidad con credenciales heredadas (md5 o plano) y rehasheo automático
    else if ($hash_guardado === md5($pass_raw) || $hash_guardado === $pass_raw) {
        $autenticado = true;
        $nuevo_hash = password_hash($pass_raw, PASSWORD_BCRYPT);
        $stmtUp = mysqli_prepare($conn, "UPDATE users SET password_u = ? WHERE id_user = ?");
        mysqli_stmt_bind_param($stmtUp, "si", $nuevo_hash, $usuario['id_user']);
        mysqli_stmt_execute($stmtUp);
        mysqli_stmt_close($stmtUp);
    }
}

if ($autenticado) {
    // Regenerar ID de sesión para prevenir Session Fixation
    session_regenerate_id(true);
    $_SESSION['usuarioingresando'] = $correo;
    $_SESSION['nombre_usuario'] = $usuario['name_u'];
    header("Location: ../PAGINAS/PaginaWeb1.php");
    exit();
} else {
    echo "<script> alert('Usuario o contraseña incorrectos'); window.location= '../PAGINAS/PaginaWebIniciarSesion.html'; </script>";
    exit();
}
?>
