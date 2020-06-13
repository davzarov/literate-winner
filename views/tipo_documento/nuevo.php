<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo Tipo Documento</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=tipo_documento&a=index">Tipo Documento Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Tipo Documento</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-tipo_documento"
            name="f1"
            action="?c=tipo_documento&a=guardar"
            method="POST"
            enctype="multipart/form-data"
        >
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
            <hr/>
            <div class="text-right">
                <button class="btn btn-success">Guardar</button>
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
