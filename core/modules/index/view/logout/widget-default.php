<?php
// -- Cierre de Sesión Seguro para Eco Mirador

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. Limpiar todas las variables de sesión activas
$_SESSION = array();

// 2. Destruir la cookie de sesión en el navegador si existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Destruir la sesión en el servidor por completo
session_destroy();

// 4. Redireccionar directamente a la pantalla limpia de inicio de sesión
print "<script>window.location='index.php?view=login';</script>";
exit;
?>