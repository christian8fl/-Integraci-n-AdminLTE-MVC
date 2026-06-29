<?php

// 1. Validar estrictamente si existe una sesión activa (Ajusta 'user_id' según las variables de tu sistema)
if(!isset($_SESSION["user_id"])){
    print "<script>window.location='index.php?view=login';</script>";
    exit;
}

?>
<div class="container-fluid pt-3">
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-success fw-bold"><i class="bi bi-images"></i> Galería de Biodiversidad y Experiencias</h2>
            <p class="text-muted">Registro visual de los atractivos, flora, fauna y actividades comunitarias en Intag</p>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white image-hover-card">
                        <img src="uploads/fotos/intag.jpg" class="card-img-top" alt="Valle de Intag" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2 bg-gradient-dark">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Paisaje Intag</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/aves.jpg" class="card-img-top" alt="Avifauna" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Avifauna Local</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/cascadas.jpg" class="card-img-top" alt="Cascadas" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Cascadas y Vertientes</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/cabañas.jpg" class="card-img-top" alt="Cabañas Ecológicas" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Infraestructura Sustentable</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/senderismo.jpg" class="card-img-top" alt="Caminatas interpretativas" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Senderos de Conservación</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/molienda.jpg" class="card-img-top" alt="Procesos artesanales" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Taller de Molienda Tradicional</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/artesanias.jpg" class="card-img-top" alt="Artesanías comunitarias" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Bioemprendimiento y Artesanías</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/campamentos.jpg" class="card-img-top" alt="Zona de campamento" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Zonas de Aventura Nocturna</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/cascadas.jpg" class="card-img-top" alt="Cascadas" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">cascadas naturales</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/talleres.jpg" class="card-img-top" alt="Talleres" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Talleres</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/animales.jpg" class="card-img-top" alt="animales" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">animales</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden bg-dark text-white">
                        <img src="uploads/fotos/experiencias3.jpg" class="card-img-top" alt="Pizza" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="card-text small mb-0 fw-bold text-success-light text-center">Pizza</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .card-img-top {
        transition: transform .3s ease-in-out;
    }
    .card:hover .card-img-top {
        transform: scale(1.06);
    }
    .bg-gradient-dark {
        background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.6));
    }
</style>