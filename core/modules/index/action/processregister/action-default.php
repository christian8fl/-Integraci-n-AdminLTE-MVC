<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula   = isset($_POST['txtCedula']) ? trim($_POST['txtCedula']) : '';
    $nombre   = isset($_POST['txtNombre']) ? trim($_POST['txtNombre']) : '';
    $apellido = isset($_POST['txtApellido']) ? trim($_POST['txtApellido']) : '';
    $usuario  = isset($_POST['txtUsuario']) ? trim($_POST['txtUsuario']) : '';
    $password = isset($_POST['txtPassword']) ? trim($_POST['txtPassword']) : '';

    if (!empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($usuario) && !empty($password)) {
        try {
            $con = Database::getCon();

            // Comprobar si la cédula o el nombre de usuario ya existen
            $check = $con->prepare("SELECT id_usuario FROM usuarios WHERE cedula = :cedula OR usuario = :usuario LIMIT 1");
            $check->execute([':cedula' => $cedula, ':usuario' => $usuario]);
            
            if ($check->rowCount() > 0) {
                $_SESSION['user_error'] = "La cédula o el nombre de usuario ya están registrados.";
                echo "<script>window.history.back();</script>";
                exit;
            }

            // Encriptación segura utilizando Bcrypt
            $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (cedula, nombre, apellido, usuario, password) VALUES (:cedula, :nombre, :apellido, :usuario, :password)";
            $stmt = $con->prepare($sql);
            
            $resultado = $stmt->execute([
                ':cedula'   => $cedula,
                ':nombre'   => $nombre,
                ':apellido' => $apellido,
                ':usuario'  => $usuario,
                ':password' => $password_encriptada
            ]);

            if ($resultado) {
                echo "<script>
                        alert('¡Registro exitoso! Ahora puedes iniciar sesión.');
                        window.location.href = './?view=login';
                      </script>";
                exit;
            }

        } catch (Exception $e) {
            $_SESSION['user_error'] = "Error al procesar registro: " . $e->getMessage();
            echo "<script>window.history.back();</script>";
            exit;
        }
    } else {
        $_SESSION['user_error'] = "Todos los campos son obligatorios.";
        echo "<script>window.history.back();</script>";
        exit;
    }
}
?>