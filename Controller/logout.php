<?php
// Inicia la sesión si aún no ha sido iniciada
session_start();

// Borra todas las variables de sesión
$_SESSION = [];

// Destruye la cookie de sesión si existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), 
        '', 
        time() - 42000,
        $params["path"], 
        $params["domain"],
        $params["secure"], 
        $params["httponly"]
    );
}

// Destruye la sesión
session_destroy();

// Redirige al login con un mensaje opcional
header("Location: ../html/indexP.php?logout=1");
exit;
