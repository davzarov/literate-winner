<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['pais']->pais_codigo != null ? 'Editar '.$context['pais']->pais_descripcion : 'Editar País'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/paises">País Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['pais']->pais_codigo != null ? 'Editar '.$context['pais']->pais_descripcion : 'Editar País'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-pais"
            action="<?php echo URL_ROOT; ?>/paises/editar/<?php echo $context['pais']->pais_codigo; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="pais_codigo"
                value="<?php echo $context['pais']->pais_codigo; ?>"
            />
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
<?php require APP_ROOT.'/views/layout_under.php'; ?>