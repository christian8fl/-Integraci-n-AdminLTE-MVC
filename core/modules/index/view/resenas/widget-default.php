<?php
// core/modules/index/view/resenas/widget-default.php

// 1. Validar estrictamente si existe una sesión activa (Ajusta 'user_id' según las variables de tu sistema)
if(!isset($_SESSION["user_id"])){
    print "<script>window.location='index.php?view=login';</script>";
    exit;
}

// Lógica para procesar el formulario POST si ya inició sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar inserción aquí...
    echo "<script>alert('¡Gracias por tu reseña! Se ha enviado a revisión.');</script>";
}
?>
<?php
// core/modules/index/view/resenas/widget-default.php

// Aquí puedes añadir tu lógica de PHP en el futuro para registrar en la BD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar inserción: $nombre = $_POST['nombre']; $estrellas = $_POST['estrellas']; $comentario = $_POST['comentario'];
    echo "<script>alert('¡Gracias por tu reseña! Se ha enviado a revisión.');</script>";
}
?>

<div class="container-fluid pt-3">
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-success fw-bold"><i class="bi bi-chat-square-heart-fill"></i> Experiencias de nuestros Visitantes</h2>
            <p class="text-muted mb-0">Gestión de opiniones, testimonios y calificaciones del Eco Mirador Portal Armónico.</p>
            <hr>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 bg-success text-white text-center p-4 h-100 d-flex flex-column justify-content-center align-items-center">
                <h1 class="fw-extrabold display-4 mb-0">4.9</h1>
                <div class="text-warning my-2 fs-4">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p class="mb-0 small text-white-50">Calificación basada en las últimas reservas ejecutadas</p>
            </div>
        </div>

        <div class="col-md-5 mb-3">
            <div class="card shadow-sm border-0 p-3 h-100 justify-content-center">
                <div class="d-flex align-items-center mb-1">
                    <span class="small fw-bold me-2" style="width: 20px;">5<i class="bi bi-star-fill text-warning ms-1"></i></span>
                    <div class="progress w-100" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 92%"></div>
                    </div>
                    <span class="small text-muted ms-2">92%</span>
                </div>
                <div class="d-flex align-items-center mb-1">
                    <span class="small fw-bold me-2" style="width: 20px;">4<i class="bi bi-star-fill text-warning ms-1"></i></span>
                    <div class="progress w-100" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 8%"></div>
                    </div>
                    <span class="small text-muted ms-2">8%</span>
                </div>
                <div class="d-flex align-items-center mb-1">
                    <span class="small fw-bold me-2" style="width: 20px;">3<i class="bi bi-star-fill text-warning ms-1"></i></span>
                    <div class="progress w-100" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 0%"></div>
                    </div>
                    <span class="small text-muted ms-2">0%</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3 d-grid align-items-stretch">
            <button type="button" 
                    class="btn btn-outline-success fw-bold d-flex flex-column justify-content-center align-items-center shadow-sm w-100" 
                    data-toggle="modal" 
                    data-target="#modalNuevaResena"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalNuevaResena">
                <i class="bi bi-plus-circle-fill fs-2 mb-2"></i>
                Escribir una Reseña
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <h5 class="fw-bold text-secondary"><i class="bi bi-sort-down"></i> Reseñas más recientes</h5>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 9px;"><i class="bi bi-calendar3"></i> Hace 2 días</span>
                        </div>
                        <p class="card-text text-secondary text-justify small italic">
                            "Una desconexión total increíble. Las vistas de Intag desde el mirador son mágicas y la atención familiar te hace sentir en casa. ¡El sendero ecológico y la molienda de caña son excepcionales!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center mt-3 pt-2 border-top">
                        <div class="bg-success-light rounded-circle p-2 text-center text-success fw-bold me-2" style="width:38px; height:38px; font-size:12px; background-color: #e8f5e9;">
                            CM
                        </div>
                        <div>
                            <h6 class="fw-bold m-0 small text-dark">Carlos Mendoza</h6>
                            <small class="text-muted" style="font-size: 10px;">Turista Nacional — Quito</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-3 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star text-muted"></i>
                            </div>
                            <span class="text-muted text-uppercase fw-bold" style="font-size: 9px;"><i class="bi bi-calendar3"></i> Hace 1 semana</span>
                        </div>
                        <p class="card-text text-secondary text-justify small">
                            "El Glamping superó mis expectativas. Dormir bajo el cielo limpio de Pucará es una experiencia única. El taller gastronómico de pizza rústica en horno de leña fue súper interactivo."
                        </p>
                    </div>
                    <div class="d-flex align-items-center mt-3 pt-2 border-top">
                        <div class="bg-success-light rounded-circle p-2 text-center text-success fw-bold me-2" style="width:38px; height:38px; font-size:12px; background-color: #e8f5e9;">
                            AM
                        </div>
                        <div>
                            <h6 class="fw-bold m-0 small text-dark">Andrea Miller</h6>
                            <small class="text-muted" style="font-size: 10px;">Visitante Internacional — Canadá</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNuevaResena" tabindex="-1" role="dialog" aria-labelledby="modalNuevaResenaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="modalNuevaResenaLabel"><i class="bi bi-pencil-square"></i> Compartir mi Experiencia</h5>
                <button type="button" class="close text-white border-0 bg-transparent fs-4" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <label class="fw-bold d-block mb-1 small text-secondary">¿Cómo calificarías tu estadía?</label>
                        <div class="rating-stars fs-3" style="cursor: pointer;">
                            <i class="bi bi-star text-secondary star-btn" data-value="1"></i>
                            <i class="bi bi-star text-secondary star-btn" data-value="2"></i>
                            <i class="bi bi-star text-secondary star-btn" data-value="3"></i>
                            <i class="bi bi-star text-secondary star-btn" data-value="4"></i>
                            <i class="bi bi-star text-secondary star-btn" data-value="5"></i>
                        </div>
                        <input type="hidden" name="estrellas" id="input_estrellas" value="0" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold mb-1 small text-dark">Tu Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-sm text-secondary" placeholder="Ej. Ana" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold mb-1 small text-dark">Tu Procedencia</label>
                            <input type="text" name="procedencia" class="form-control form-control-sm text-secondary" placeholder="Ej. Ibarra, Ecuador" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-1 small text-dark">Tu Comentario / Testimonio</label>
                        <textarea name="comentario" class="form-control text-secondary small" rows="4" placeholder="Cuéntanos qué fue lo que más te gustó de las rutas, el mirador o la atención..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-secondary fw-bold" data-dismiss="modal" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-success fw-bold px-3">Publicar Testimonio</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const estrellas = document.querySelectorAll('.star-btn');
    const inputEstrellas = document.getElementById('input_estrellas');

    estrellas.forEach(star => {
        star.addEventListener('click', function() {
            const valor = this.getAttribute('data-value');
            inputEstrellas.value = valor;

            // Pintar estrellas seleccionadas
            estrellas.forEach(s => {
                const sValor = s.getAttribute('data-value');
                if (sValor <= valor) {
                    s.classList.remove('bi-star', 'text-secondary');
                    s.classList.add('bi-star-fill', 'text-warning');
                } else {
                    s.classList.remove('bi-star-fill', 'text-warning');
                    s.classList.add('bi-star', 'text-secondary');
                }
            });
        });
    });
});
</script>