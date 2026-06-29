<div class="row align-items-center justify-content-center pt-5">
    <div class="form-group col-sm-6 text-center mb-4 mb-sm-0">
        <p>
            <i class="bi bi-tree-fill text-success" style="font-size: 7rem;"></i>
        </p>
        <h3 class="text-success fw-bold">Eco Mirador</h3>
        <p class="text-muted lead mb-1">Portal Armónico</p>
        <div class="small text-secondary">
            <p class="mb-1"><i class="bi bi-geo-alt-fill text-success"></i> Comunidad de Pucará, Apuela</p>
            <p class="mb-1">Cotacachi - Imbabura, Ecuador</p>
            <p><i class="bi bi-shield-check text-success"></i> Sistema de Gestión Ecoturística</p>
        </div>
    </div>

    <div class="form-group col-sm-6 d-flex justify-content-center">
        <div class="login-box" style="max-width: 100%; width: 400px;">
            <div class="card card-outline card-success shadow">
                <div class="card-header text-center">
                    <h3 class="fw-bold text-success mb-0"><i class="bi bi-lock"></i> Acceso al Sistema</h3>
                </div>
                <div class="card-body login-card-body">

                    <?php
                    if (isset($_SESSION['user_error']) && $_SESSION['user_error'] != null) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-x-circle-fill me-2"></i> <strong>Error:</strong>
                            <?php echo htmlspecialchars($_SESSION['user_error']); ?>
                        </div>
                    <?php
                        $_SESSION['user_error'] = null;
                    }
                    ?>

                    <p class="login-box-msg text-muted small text-center mb-3">Inicia sesión para gestionar reservas y operaciones</p>

                    <form action="./?action=processlogin" method="post">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input id="loginEmail" type="text" name="txtCedula" class="form-control" placeholder="Usuario" required />
                                <label for="loginEmail">Usuario / Cédula</label>
                            </div>
                            <div class="input-group-text">
                                <span class="bi bi-person-fill text-success"></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input id="loginPassword" type="password" name="txtPassword" class="form-control" placeholder="Password" required />
                                <label for="loginPassword">Contraseña</label>
                            </div>
                            <div class="input-group-text">
                                <span class="bi bi-lock-fill text-success"></span>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" />
                                    <label class="form-check-label small text-muted" for="flexCheckDefault">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="d-grid">
                                    <button type="submit" name="btn-login" class="btn btn-success fw-bold">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="text-muted">

                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-decoration-none text-muted small">¿Olvidaste tu clave?</a>
                        <a href="./?view=registro" class="text-decoration-none text-success fw-bold small"><i class="bi bi-person-plus-fill"></i> Crear Cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>