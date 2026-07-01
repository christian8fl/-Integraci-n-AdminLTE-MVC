<?php
// Aseguramos que la sesión esté activa antes de operar con ella
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cedula   = isset($_POST['txtCedula']) ? trim($_POST['txtCedula']) : '';
    $password = isset($_POST['txtPassword']) ? trim($_POST['txtPassword']) : '';

    if (!empty($cedula) && !empty($password)) {
        try {
            $con = Database::getCon();

            // MEJORA: Añadimos 'id_rol' a la consulta SQL
            $stmt = $con->prepare("SELECT id_usuario, nombre, apellido, usuario, password, id_rol FROM usuarios WHERE usuario = :user OR cedula = :cedula LIMIT 1");
            $stmt->execute([
                ':user'   => $cedula,
                ':cedula' => $cedula
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Limpiamos errores previos de login
                unset($_SESSION['user_error']);

                // Inicializamos todas las variables de sesión requeridas por tu sistema
                $_SESSION['user_id']   = $user['id_usuario'];
                $_SESSION['user_name'] = $user['nombre'] . ' ' . $user['apellido'];
                $_SESSION['username']  = $user['usuario'];
                $_SESSION['logged_in'] = true;
                
                // CRUCIAL: Guardamos el rol en la sesión para el validador de rutas en index.php
                $_SESSION['id_rol']    = (int)$user['id_rol']; 

                // Redirección limpia al módulo de bienvenida
                echo "<script>window.location.href = 'index.php?view=introduccion';</script>";
                exit;
            } else {
                $_SESSION['user_error'] = "Las credenciales ingresadas son incorrectas.";
                echo "<script>window.history.back();</script>";
                exit;
            }

        } catch (Exception $e) {
            $_SESSION['user_error'] = "Error en el servidor: " . $e->getMessage();
            echo "<script>window.history.back();</script>";
            exit;
        }
    } else {
        $_SESSION['user_error'] = "Por favor, complete todos los campos.";
        echo "<script>window.history.back();</script>";
        exit;
    }
}
?>