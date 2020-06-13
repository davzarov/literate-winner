<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $roles->roles_codigo != null ? 'Editar '.$roles->roles_descripcion : 'Editar Rol'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=roles&a=index">Rol Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $roles->roles_codigo != null ? 'Editar '.$roles->roles_descripcion : 'Editar Rol'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-roles"
            action="?c=roles&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="rol_codigo"
                value="<?php echo $rol->rol_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="rol_descripcion"
                    value="<?php echo $rol->rol_descripcion; ?>"
                    class="form-control"
                    placeholder="Administrador"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Usuarios</label>
                <select
                    name="usuario_codigo"
                    class="custom-select d-block w-100"
                    required
                >
                    <option value="">Seleccione un Usuario</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?php echo $usuario->usuario_codigo; ?>">
                            <?php echo $usuario->usuario_login; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Personas</label>
                <select
                    name="persona_codigo"
                    class="custom-select d-block w-100"
                    required
                >
                    <option value="">Seleccione una Persona</option>
                    <?php foreach ($personas as $persona): ?>
                        <option value="<?php echo $persona->persona_codigo; ?>">
                            <?php echo $persona->persona_nombre1 . ' ' . $persona->persona_apellido1; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
        $("#frm-roles").submit(function () {
            return $(this).validate();
        });
    })
</script>