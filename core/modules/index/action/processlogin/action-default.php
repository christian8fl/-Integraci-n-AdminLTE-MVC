<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cedula   = isset($_POST['txtCedula']) ? trim($_POST['txtCedula']) : '';
    $password = isset($_POST['txtPassword']) ? trim($_POST['txtPassword']) : '';

    if (!empty($cedula) && !empty($password)) {
        try {
            $con = Database::getCon();

            // Corregido: Usamos dos marcadores distintos (:user y :cedula) para evitar el error HY093
            $stmt = $con->prepare("SELECT id_usuario, nombre, apellido, usuario, password FROM usuarios WHERE usuario = :user OR cedula = :cedula LIMIT 1");
            $stmt->execute([
                ':user'   => $cedula,
                ':cedula' => $cedula
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                unset($_SESSION['user_error']);

                $_SESSION['user_id']   = $user['id_usuario'];
                $_SESSION['user_name'] = $user['nombre'] . ' ' . $user['apellido'];
                $_SESSION['username']  = $user['usuario'];
                $_SESSION['logged_in'] = true;

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