<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['usuario']->usuario_codigo != null ? 'Editar '.$context['usuario']->usuario_login : 'Editar Persona'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/usuarios">Usuario Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['usuario']->usuario_codigo != null ? 'Editar '.$context['usuario']->usuario_login : 'Editar Persona'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-usuario"
            action="<?php echo URL_ROOT; ?>/usuarios/editar/<?php echo $context['usuario']->usuario_codigo; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="usuario_codigo"
                value="<?php echo $context['usuario']->usuario_codigo; ?>"
            />
            <div class="form-group">
                <label>Nombre de usuario</label>
                <input
                    type="text"
                    name="usuario_login"
                    value="<?php echo $context['usuario']->usuario_login; ?>"
                    class="form-control disabled"
                    placeholder="Usuario"
                    data-validacion-tipo="requerido"
                    readonly
                />
            </div>
            <div class="form-group">
                <label>Contraseña Anterior</label>
                <input
                    type="password"
                    name="usuario_password_anterior"
                    class="form-control"
                    placeholder="********"
                    data-validacion-tipo="requerido|min:8"
                />
            </div>
            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input
                    type="password"
                    name="usuario_password"
                    class="form-control"
                    placeholder="********"
                    data-validacion-tipo="requerido|min:8"
                />
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input
                    type="password"
                    name="usuario_password_confirmacion"
                    class="form-control"
                    placeholder="********"
                    data-validacion-tipo="requerido|min:8"
                />
            </div>
            <hr />
            <div class="text-right">
                <button class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#frm-usuario").submit(function () {
            return $(this).validate();
        });
    })
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>