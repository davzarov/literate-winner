<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $pais->pais_codigo != null ? 'Editar '.$pais->pais_descripcion : 'Editar País'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=pais&a=index">País Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $pais->pais_codigo != null ? 'Editar '.$pais->pais_descripcion : 'Editar País'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-pais"
            action="?c=pais&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="pais_codigo"
                value="<?php echo $pais->pais_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="pais_descripcion"
                    value="<?php echo $pais->pais_descripcion; ?>"
                    class="form-control"
                    placeholder="Femenino"
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
        $("#frm-pais").submit(function () {
            return $(this).validate();
        });
    })
</script>