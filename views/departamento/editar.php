<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['departamento']->departamento_codigo != null ? 'Editar '.$context['departamento']->departamento_descripcion : 'Editar Departamento'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/departamentos">Departamento Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['departamento']->departamento_codigo != null ? 'Editar '.$context['departamento']->departamento_descripcion : 'Editar Departamento'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-departamento"
            action="<?php echo URL_ROOT; ?>/departamentos/editar/<?php echo $context['departamento']->departamento_codigo; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="departamento_codigo"
                value="<?php echo $context['departamento']->departamento_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="departamento_descripcion"
                    value="<?php echo $context['departamento']->departamento_descripcion; ?>"
                    class="form-control"
                    placeholder="Central"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>País</label>
                <select
                    name="pais_codigo"
                    class="custom-select d-block w-100"
                >
                    <option value="">Seleccione un País</option>
                    <?php foreach ($context['paises'] as $pais): ?>
                        <option
                            value="<?php echo $pais->pais_codigo; ?>"
                            <?php if($pais->pais_codigo == $context['departamento']->pais_codigo):
                                echo("selected"); ?>
                            <?php endif; ?>
                        >
                            <?php echo $pais->pais_descripcion; ?>
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
        $("#frm-departamento").submit(function () {
            return $(this).validate();
        });
    })
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>