<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['tipo_persona']->tipo_persona_codigo != null ? 'Editar '.$context['tipo_persona']->tipo_persona_descripcion : 'Editar Tipo Persona'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/tipo_personas">Tipo Persona Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['tipo_persona']->tipo_persona_codigo != null ? 'Editar '.$context['tipo_persona']->tipo_persona_descripcion : 'Editar Tipo Persona'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-tipo_persona"
            action="<?php echo URL_ROOT; ?>/tipo_personas/editar/<?php echo $context['tipo_persona']->tipo_persona_codigo; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="tipo_persona_codigo"
                value="<?php echo $context['tipo_persona']->tipo_persona_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="tipo_persona_descripcion"
                    value="<?php echo $context['tipo_persona']->tipo_persona_descripcion; ?>"
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
<?php require APP_ROOT.'/views/layout_under.php'; ?>