<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $persona->persona_codigo != null ? 'Editar '.$persona->persona_descripcion : 'Editar Persona'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=persona&a=index">Persona Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $persona->persona_codigo != null ? 'Editar '.$persona->persona_descripcion : 'Editar Persona'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-persona"
            action="?c=persona&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="row">
                <div class="col-md-12">
                    <input
                        type="hidden"
                        name="persona_codigo"
                        value="<?php echo $persona->persona_codigo; ?>"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Primer Nombre</label>
                        <input
                            type="text"
                            name="persona_nombre1"
                            value="<?php echo $persona->persona_nombre1; ?>"
                            class="form-control"
                            placeholder="David"
                            data-validacion-tipo="requerido"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Segundo Nombre</label>
                        <input
                            type="text"
                            name="persona_nombre2"
                            value="<?php echo $persona->persona_nombre2; ?>"
                            class="form-control"
                            placeholder="Ariel"
                            data-validacion-tipo="requerido"
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Primer Apellido</label>
                        <input
                            type="text"
                            name="persona_apellido1"
                            value="<?php echo $persona->persona_apellido1; ?>"
                            class="form-control"
                            placeholder="Zárate"
                            data-validacion-tipo="requerido"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Segundo Apellido</label>
                        <input
                            type="text"
                            name="persona_apellido2"
                            value="<?php echo $persona->persona_apellido2; ?>"
                            class="form-control"
                            placeholder="Oviedo"
                            data-validacion-tipo="requerido"
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo Persona</label>
                        <select
                            name="tipo_persona_codigo"
                            class="custom-select d-block w-100"
                            required
                        >
                            <option value="">Seleccione un Tipo Persona</option>
                            <?php foreach ($tipos_persona as $tipo_persona): ?>
                                <option value="<?php echo $tipo_persona->tipo_persona_codigo; ?>">
                                    <?php echo $tipo_persona->tipo_persona_descripcion; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo Documento</label>
                        <select
                            name="tipo_documento_codigo"
                            class="custom-select d-block w-100"
                            required
                        >
                            <option value="">Seleccione un Tipo Documento</option>
                            <?php foreach ($tipos_documento as $tipo_documento): ?>
                                <option value="<?php echo $tipo_documento->tipo_documento_codigo; ?>">
                                    <?php echo $tipo_documento->tipo_documento_descripcion; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Género</label>
                        <select
                            name="genero_codigo"
                            class="custom-select d-block w-100"
                            required
                        >
                            <option value="">Seleccione un Género</option>
                            <?php foreach ($generos as $genero): ?>
                                <option value="<?php echo $genero->genero_codigo; ?>">
                                    <?php echo $genero->genero_descripcion; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Barrio</label>
                        <select
                            name="barrio_codigo"
                            class="custom-select d-block w-100"
                            required
                        >
                            <option value="">Seleccione un Barrio</option>
                            <?php foreach ($barrios as $barrio): ?>
                                <option value="<?php echo $barrio->barrio_codigo; ?>">
                                    <?php echo $barrio->barrio_descripcion; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
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
        $("#frm-persona").submit(function () {
            return $(this).validate();
        });
    })
</script>