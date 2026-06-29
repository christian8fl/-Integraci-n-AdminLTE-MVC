<div class="row align-items-center justify-content-center pt-5">
    <div class="form-group col-sm-6 text-center mb-4 mb-sm-0">
        <p><i class="bi bi-person-check-fill text-success" style="font-size: 7rem;"></i></p>
        <h3 class="text-success fw-bold">Eco Mirador</h3>
        <p class="text-muted lead mb-1">Portal Armónico</p>
        <div class="small text-secondary">
            <p class="mb-1"><i class="bi bi-shield-lock-fill text-success"></i> Registro de Administradores</p>
            <p>Crea tu acceso de seguridad para el sistema</p>
        </div>
    </div>

    <div class="form-group col-sm-6 d-flex justify-content-center">
        <div class="login-box" style="max-width: 100%; width: 400px;">
            <div class="card card-outline card-success shadow">
                <div class="card-header text-center">
                    <h3 class="fw-bold text-success mb-0"><i class="bi bi-person-plus"></i> Registrarse</h3>
                </div>
                <div class="card-body login-card-body">
                    
                    <?php if (isset($_SESSION['user_error']) && $_SESSION['user_error'] != null): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-x-circle-fill me-2"></i> <?php echo htmlspecialchars($_SESSION['user_error']); $_SESSION['user_error'] = null; ?>
                        </div>
                    <?php endif; ?>

                    <form action="./?action=processregister" method="post">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" name="txtCedula" class="form-control" placeholder="Cédula" required />
                                <label>Número de Cédula</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-card-text text-success"></span></div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" required />
                                <label>Nombre</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-fonts text-success"></span></div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" name="txtApellido" class="form-control" placeholder="Apellido" required />
                                <label>Apellido</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-fonts text-success"></span></div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" name="txtUsuario" class="form-control" placeholder="Usuario" required />
                                <label>Nombre de Usuario (Alias)</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-person-fill text-success"></span></div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" name="txtPassword" class="form-control" placeholder="Password" required />
                                <label>Contraseña</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-lock-fill text-success"></span></div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success fw-bold py-2">Crear Cuenta</button>
                        </div>
                    </form>

                    <hr class="text-muted">
                    <p class="mb-0 text-center">
                        <a href="./?view=login" class="text-decoration-none text-success small">¿Ya tienes cuenta? Inicia Sesión</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>