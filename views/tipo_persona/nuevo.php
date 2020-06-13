<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo Tipo Persona</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=tipo_persona&a=index">Tipo Persona Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Tipo Persona</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-tipo_persona"
            name="f1"
            action="?c=tipo_persona&a=guardar"
            method="POST"
            enctype="multipart/form-data"
        >
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
            <hr/>
            <div class="text-right">
                <button class="btn btn-success">Guardar</button>
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
