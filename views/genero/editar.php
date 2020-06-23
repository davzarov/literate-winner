<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['genero']->genero_codigo != null ? 'Editar '.$context['genero']->genero_descripcion : 'Editar Género'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/generos">Género Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['genero']->genero_codigo != null ? 'Editar '.$context['genero']->genero_descripcion : 'Editar Género'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-genero"
            action="<?php echo URL_ROOT; ?>/generos/editar/<?php echo $context['genero']->genero_codigo; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="genero_codigo"
                value="<?php echo $context['genero']->genero_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="genero_descripcion"
                    value="<?php echo $context['genero']->genero_descripcion; ?>"
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
        $("#frm-genero").submit(function () {
            return $(this).validate();
        });
    })
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>