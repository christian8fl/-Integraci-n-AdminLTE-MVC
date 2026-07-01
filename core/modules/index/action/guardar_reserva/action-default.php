<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoger las variables del formulario limpiando espacios en blanco
    $nombre_cliente       = trim($_POST['nombre_cliente']);
    $apellido_cliente     = trim($_POST['apellido_cliente']);
    $documento_identidad  = trim($_POST['documento_identidad']);
    
    // Convertir cadenas vacías en NULL reales para evitar colisiones con la restricción UNIQUE de la base de datos
    $telefono = (isset($_POST['telefono']) && trim($_POST['telefono']) !== '') ? trim($_POST['telefono']) : null;
    $correo   = (isset($_POST['correo']) && trim($_POST['correo']) !== '') ? trim($_POST['correo']) : null;
    
    $paquete_turistico    = $_POST['paquete_turistico'];
    $id_responsable       = intval($_POST['id_responsable']);
    $fecha_ingreso        = $_POST['fecha_ingreso'];
    $fecha_salida         = $_POST['fecha_salida'];
    
    // Capturar la cantidad de personas (por defecto 1 si no viene en el formulario)
    $cantidad_personas    = (isset($_POST['cantidad_personas']) && intval($_POST['cantidad_personas']) > 0) ? intval($_POST['cantidad_personas']) : 1;

    try {
        $con = Database::getCon();
        $con->beginTransaction(); // Iniciamos una transacción de seguridad para evitar datos huérfanos

        // 2. Verificar si el cliente ya existe mediante su documento de identidad
        $stmtCheckCliente = $con->prepare("SELECT id_cliente FROM clientes WHERE documento_identidad = ?");
        $stmtCheckCliente->execute([$documento_identidad]);
        $cliente = $stmtCheckCliente->fetch();

        if ($cliente) {
            // El cliente ya está registrado, heredamos su ID existente
            $id_cliente = $cliente['id_cliente'];
        } else {
            // El cliente es nuevo, lo insertamos asegurando las columnas reales de tu tabla
            $sqlInsertCli = "INSERT INTO clientes (nombre, apellido, documento_identidad, telefono, correo, created_at) 
                             VALUES (?, ?, ?, ?, ?, NOW())";
            $stmtInsertCliente = $con->prepare($sqlInsertCli);
            $stmtInsertCliente->execute([$nombre_cliente, $apellido_cliente, $documento_identidad, $telefono, $correo]);
            $id_cliente = $con->lastInsertId(); 
        }

        // 3. Insertar la reserva en la agenda vinculando los IDs correspondientes
        // Se establece por defecto en 'Pendiente' que coincide con el ENUM de tu base de datos
        $sqlReserva = "INSERT INTO agenda_reservas (id_cliente, id_responsable, paquete_turistico, fecha_ingreso, fecha_salida, cantidad_personas, estado_reserva, created_at) 
                       VALUES (?, ?, ?, ?, ?, ?, 'Pendiente', NOW())";
        
        $stmtReserva = $con->prepare($sqlReserva);
        $stmtReserva->execute([$id_cliente, $id_responsable, $paquete_turistico, $fecha_ingreso, $fecha_salida, $cantidad_personas]);

        $con->commit(); // Confirmamos los cambios de manera segura en la base de datos
        $_SESSION['reserva_msg'] = "🎉 ¡Reserva procesada con éxito para la experiencia: " . htmlspecialchars($paquete_turistico) . "!";

    } catch (Exception $e) {
        // Si algo falla, revertimos la transacción para no dejar filas incompletas
        if (isset($con) && $con->inTransaction()) { 
            $con->rollBack(); 
        } 
        $_SESSION['reserva_msg'] = "❌ Error técnico al guardar la reserva: " . $e->getMessage();
    }

    // Redirección de vuelta al panel de planificación de estadías
    header("Location: index.php?view=agendar");
    exit;
} else {
    header("Location: index.php?view=paquetes");
    exit;
}
