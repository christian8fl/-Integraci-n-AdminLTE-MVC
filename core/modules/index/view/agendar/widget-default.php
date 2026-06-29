<?php
try {
    $con = Database::getCon();
    $stmtResp = $con->prepare("SELECT id_responsable, nombre, apellido FROM responsables ORDER BY apellido ASC");
    $stmtResp->execute();
    $responsables = $stmtResp->fetchAll();
} catch (Exception $e) {
    echo "<div class='alert alert-danger m-3'>Error de conexión: " . $e->getMessage() . "</div>";
}

// Capturar el paquete seleccionado que llega desde la URL
$paquete_seleccionado = isset($_GET['paquete']) ? trim($_GET['paquete']) : '';
?>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<style>
    /* Ajustes estéticos para acoplar el calendario elegantemente en AdminLTE */
    .fc { font-family: sans-serif; font-size: 0.88rem; }
    .fc .fc-toolbar-title { font-size: 1.15rem; font-weight: bold; color: #333; text-transform: capitalize; }
    .fc .fc-button-primary { background-color: #28a745; border-color: #28a745; padding: 4px 8px; }
    .fc .fc-button-primary:hover { background-color: #218838; border-color: #1e7e34; }
    .fc .fc-button-primary:disabled { background-color: #6c757d; border-color: #6c757d; }
    .fc-event { cursor: pointer; padding: 2px 4px; font-weight: 500; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
</style>

<div class="container-fluid pt-3">
    <?php if (isset($_SESSION['reserva_msg'])): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['reserva_msg']; unset($_SESSION['reserva_msg']); ?>
        </div>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-success fw-bold"><i class="bi bi-calendar-event-fill"></i> Planificación de Estadías</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card shadow border-top border-success border-3">
                <div class="card-header bg-success text-white">
                    <h5 class="m-0 fw-bold"><i class="bi bi-clipboard-check"></i> Formulario de Registro</h5>
                </div>
                <form action="index.php?action=guardar_reserva" method="POST">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Nombre del Turista</label>
                                <input type="text" name="nombre_cliente" class="form-control text-secondary" placeholder="Ej. Juan" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Apellido del Turista</label>
                                <input type="text" name="apellido_cliente" class="form-control text-secondary" placeholder="Ej. Pérez" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Documento de Identidad (Cédula / Pasaporte)</label>
                                <input type="text" name="documento_identidad" class="form-control text-secondary" placeholder="Ej. 100xxxxxx" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Teléfono / Celular</label>
                                <input type="text" name="telefono" class="form-control text-secondary" placeholder="Ej. 099xxxxxxx" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold mb-1 small">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control text-secondary" placeholder="ejemplo@correo.com" />
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold mb-1 small">Servicio / Paquete Turístico</label>
                            <select name="paquete_turistico" id="paquete_turistico" class="form-select text-secondary" required>
                                <option value="">-- Seleccione la experiencia --</option>
                                <option value="Ruta del Avistamiento" <?php echo ($paquete_seleccionado === "Ruta del Avistamiento") ? 'selected' : ''; ?>>Ruta del Avistamiento ($25.00)</option>
                                <option value="Estadía Portal Armónico" <?php echo ($paquete_seleccionado === "Estadía Portal Armónico") ? 'selected' : ''; ?>>Estadía Portal Armónico ($60.00)</option>
                                <option value="Aventura de Campamento" <?php echo ($paquete_seleccionado === "Aventura de Campamento") ? 'selected' : ''; ?>>Aventura de Campamento ($15.00)</option>
                                <option value="Senderismo de Exploración" <?php echo ($paquete_seleccionado === "Senderismo de Exploración") ? 'selected' : ''; ?>>Senderismo de Exploración ($80.00)</option>
                                <option value="Taller Gastronómico de Pizza" <?php echo ($paquete_seleccionado === "Taller Gastronómico de Pizza") ? 'selected' : ''; ?>>Taller Gastronómico de Pizza ($20.00)</option>
                                <option value="Ruta de la Caña y Molienda" <?php echo ($paquete_seleccionado === "Ruta de la Caña y Molienda") ? 'selected' : ''; ?>>Ruta de la Caña y Molienda ($30.00)</option>
                                <option value="Circuito Hidrológico de Recreación" <?php echo ($paquete_seleccionado === "Circuito Hidrológico de Recreación") ? 'selected' : ''; ?>>Circuito Hidrológico de Recreación ($50.00)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold mb-1 small">Guía / Responsable Asignado</label>
                            <select name="id_responsable" class="form-select text-secondary" required>
                                <option value="">-- Seleccione el responsable --</option>
                                <?php foreach ($responsables as $resp): ?>
                                    <option value="<?php echo $resp['id_responsable']; ?>">
                                        <?php echo htmlspecialchars($resp['apellido'] . ' ' . $resp['nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Fecha de Ingreso</label>
                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control text-secondary" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold mb-1 small">Fecha de Salida</label>
                                <input type="date" name="fecha_salida" id="fecha_salida" class="form-control text-secondary" required />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <button type="submit" class="btn btn-success fw-bold px-4">Procesar Reserva</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5 mb-4">
    <div class="card shadow h-100">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="m-0 small text-uppercase fw-bold"><i class="bi bi-calendar3"></i> Control de Ocupación</h5>
            <div>
                <span class="badge bg-success">Libre</span>
                <span class="badge bg-danger">Ocupado</span>
            </div>
        </div>
        <div class="card-body p-2 bg-light">
            <div id="calendar" class="bg-white p-2 border rounded" style="min-height: 480px;"></div>
        </div>
    </div>
</div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', 
        firstDay: 1,  // Las semanas inician en Lunes
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        buttonText: {
            today: 'Hoy'
        },
        
        // ENLACE CLAVE: Llama de manera automática al archivo que configuramos en el Paso 1
        events: 'index.php?action=get_reservas',
        
        dateClick: function(info) {
            document.getElementById('fecha_ingreso').value = info.dateStr;
            document.getElementById('fecha_salida').value = info.dateStr;
            
            document.getElementById('fecha_ingreso').classList.add('is-valid');
            document.getElementById('fecha_salida').classList.add('is-valid');
            setTimeout(() => {
                document.getElementById('fecha_ingreso').classList.remove('is-valid');
                document.getElementById('fecha_salida').classList.remove('is-valid');
            }, 1500);
        }
    });
    
    calendar.render();
});
</script>