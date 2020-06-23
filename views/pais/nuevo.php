<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo País</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/paises">País Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo País</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-pais"
            name="f1"
            action="<?php echo URL_ROOT; ?>/paises/guardar"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="pais_descripcion"
                    value="<?php echo $context['pais']->pais_descripcion; ?>"
                    class="form-control"
                    placeholder="Paraguay"
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
        $("#frm-pais").submit(function () {
            return $(this).validate();
        });
    })
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>