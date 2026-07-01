<?php
?>
<?php
// Validación de sesión nativa de tu arquitectura
UserData::verificaSession();

// Zona horaria local para consistencia en el control operativo
date_default_timezone_set("America/Bogota");
$fechahoy = date("Y-m-d");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container-fluid pt-2">
    <!-- Fila de Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-success fw-bold"><i class="bi bi-speedometer2"></i> Panel de Control Principal</h1>
            <p class="text-muted">Eco Mirador Portal Armónico — Gestión de Reservas y Sostenibilidad Ambiental</p>
            <hr>
        </div>
    </div>

    <div class="row">
        <!-- Bloque Izquierdo: Estado del Sistema y Bienvenida -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-top border-success border-3 h-100">
                <div class="card-header bg-white">
                    <h5 class="m-0 text-success fw-bold"><i class="bi bi-person-workspace"></i> Control de Operaciones</h5>
                </div>
                <div class="card-body">
                    <h3 class="fw-light">¡Bienvenido al Sistema Ecoturístico!</h3>
                    <p class="mt-3 text-justify">
                        La plantilla antigua e institucional ha sido purgada exitosamente. Actualmente, el ecosistema de desarrollo se encuentra sincronizado con la base de datos <code>ecomirador_db</code> para la administración integral de visitas, rutas de avistamiento y asignación de responsables.
                    </p>
                    
                    <div class="alert alert-light border border-success-subtle mt-4">
                        <h6 class="text-success fw-bold"><i class="bi bi-calendar3"></i> Información del Día:</h6>
                        <p class="mb-0 small">Fecha de operación actual en el servidor: <strong><?php echo $fechahoy; ?></strong></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bloque Derecho: Credenciales y Roles del Usuario Activo -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top border-dark border-3 h-100">
                <div class="card-header bg-white">
                    <h5 class="m-0 text-dark fw-bold"><i class="bi bi-shield-lock-fill"></i> Perfil de Seguridad</h5>
                </div>
                <div class="card-body bg-light-subtle">
                    <!-- Visualización del Rol Actual en un Badge llamativo -->
                    <div class="text-center mb-4">
                        <span class="text-muted d-block small text-uppercase fw-bold">Rol en Uso Activo</span>
                        <span class="badge bg-success px-3 py-2 mt-1" style="font-size: 1.1rem; letter-spacing: 0.5px;">
                            <i class="bi bi-person-badge"></i> <?php echo htmlspecialchars($_SESSION['user_rol']); ?>
                        </span>
                    </div>

                    <hr>

                    <!-- Lista de Roles del Array de Sesión -->
                    <div class="mt-3">
                        <label class="fw-bold small text-muted"><i class="bi bi-tags"></i> Todos tus Roles Asignados:</label>
                        <p class="mt-1 p-2 bg-white border rounded text-secondary small">
                            <?php
                            $lista_de_ids_roles = $_SESSION['roles'];
                            if (!empty($lista_de_ids_roles)) {
                                echo htmlspecialchars(implode(", ", $lista_de_ids_roles));
                            } else {
                                echo "El usuario no cuenta con roles asignados en ecomirador_db.";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>