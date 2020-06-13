<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo Usuario</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=usuario&a=index">Usuario Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Usuario</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-usuario"
            name="f1"
            action="?c=usuario&a=guardar"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="form-group">
                <label>Nombre de Usuario</label>
                <input
                    type="text"
                    name="usuario_login"
                    value="<?php echo $usuario->usuario_login; ?>"
                    class="form-control"
                    placeholder="Usuario"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input
                    type="password"
                    name="usuario_password"
                    value="<?php echo $usuario->usuario_password; ?>"
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
            <hr/>
            <div class="text-right">
                <button class="btn btn-success">Guardar</button>
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
