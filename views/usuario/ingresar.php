<?php require APP_ROOT.'/views/layout_auth_upper.php'; ?>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h1 class="text-center">
                        <div class="h4 text-gray-900 mb-4">Bienvenido!</div>
                    </h1>
                    <!-- form -->
                    <form
                        action="<?php echo URL_ROOT; ?>/usuarios/ingresar"
                        method="POST"
                    >
                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input
                                type="text"
                                name="usuario_login"
                                value="<?php echo $context['usuario']->usuario_login; ?>"
                                class="form-control form-control-user"
                                placeholder="Usuario"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input
                                type="password"
                                name="usuario_password"
                                value="<?php echo $context['usuario']->usuario_password; ?>"
                                class="form-control form-control-user"
                                placeholder="********"
                                required
                            />
                        </div>
                        <button class="btn btn-primary btn-user btn-block">ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/layout_auth_under.php'; ?>