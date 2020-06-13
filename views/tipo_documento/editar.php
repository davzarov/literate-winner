<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $tipo_documento->tipo_documento_codigo != null ? 'Editar '.$tipo_documento->tipo_documento_descripcion : 'Editar Tipo Documento'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=tipo_documento&a=index">Tipo Documento Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $tipo_documento->tipo_documento_codigo != null ? 'Editar '.$tipo_documento->tipo_documento_descripcion : 'Editar Tipo Documento'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-tipo_documento"
            action="?c=tipo_documento&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="tipo_documento_codigo"
                value="<?php echo $tipo_documento->tipo_documento_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="tipo_documento_descripcion"
                    value="<?php echo $tipo_documento->tipo_documento_descripcion; ?>"
                    class="form-control"
                    placeholder="Pasaporte"
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
        $("#frm-tipo_documento").submit(function () {
            return $(this).validate();
        });
    })
</script>