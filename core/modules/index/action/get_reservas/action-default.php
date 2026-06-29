<?php

// 1. Limpiar absolutamente cualquier buffer o código HTML que se haya colado antes
while (ob_get_level()) {
    ob_end_clean();
}

// 2. Establecer las cabeceras JSON limpias
header('Content-Type: application/json; charset=utf-8');

try {
    $con = Database::getCon();
    
    $sql = "SELECT r.id_reserva, r.fecha_ingreso, r.fecha_salida, c.nombre, c.apellido 
            FROM agenda_reservas r
            INNER JOIN clientes c ON r.id_cliente = c.id_cliente
            WHERE r.estado_reserva != 'Cancelada'";
            
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $eventos = [];

    foreach ($reservas as $res) {
        $nombre = $res['nombre'] ?? '';
        $apellido = $res['apellido'] ?? '';
        $nombre_completo = trim($nombre . ' ' . $apellido);

        $fecha_fin_ajustada = date('Y-m-d', strtotime($res['fecha_salida'] . ' +1 day'));

        $eventos[] = [
            'id'        => $res['id_reserva'],
            'title'     => '🚫 Ocupado: ' . ($nombre_completo !== '' ? $nombre_completo : 'Cliente'),
            'start'     => $res['fecha_ingreso'],
            'end'       => $fecha_fin_ajustada,
            'color'     => '#dc3545',
            'textColor' => '#ffffff',
            'allDay'    => true
        ];
    }

    // 3. Imprimir el JSON puro
    echo json_encode($eventos, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode([]);
}

// 4. CRUCIAL: Detener la ejecución por completo aquí para evitar que se peguen scripts de analíticas
exit();