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
            <h2 class="text-success fw-bold"><i class="bi bi-eye-fill"></i> Nuestra Esencia Institucional</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow border-top border-success border-3 h-100">
                <div class="card-body">
                    <h4 class="text-success fw-bold mb-3"><i class="bi bi-shield-shaded"></i> Misión</h4>
                    <p class="text-justify text-secondary">
                        Promover el ecoturismo sostenible y comunitario en la región de Pucará, Intag, protegiendo activamente nuestra biodiversidad, rescatando los valores culturales ancestrales y dinamizando la economía local mediante experiencias auténticas en la naturaleza.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow border-top border-success border-3 h-100">
                <div class="card-body">
                    <h4 class="text-success fw-bold mb-3"><i class="bi bi-compass"></i> Visión</h4>
                    <p class="text-justify text-secondary">
                        Para el futuro, consolidar a Eco Mirador Portal Armónico como un bioemprendimiento líder de turismo regenerativo a nivel nacional, siendo reconocidos por nuestro modelo integral de conservación, educación ambiental y autogestión comunitaria.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>