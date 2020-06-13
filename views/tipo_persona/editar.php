<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $tipo_persona->tipo_persona_codigo != null ? 'Editar '.$tipo_persona->tipo_persona_descripcion : 'Editar Tipo Persona'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=tipo_persona&a=index">Tipo Persona Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $tipo_persona->tipo_persona_codigo != null ? 'Editar '.$tipo_persona->tipo_persona_descripcion : 'Editar Tipo Persona'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-tipo_persona"
            action="?c=tipo_persona&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="tipo_persona_codigo"
                value="<?php echo $tipo_persona->tipo_persona_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="tipo_persona_descripcion"
                    value="<?php echo $tipo_persona->tipo_persona_descripcion; ?>"
                    class="form-control"
                    placeholder="Jurídica"
                    data-validacion-tipo="requerido"
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
        $("#frm-tipo_persona").submit(function () {
            return $(this).validate();
        });
    })
</script>