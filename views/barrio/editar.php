<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $barrio->barrio_codigo != null ? 'Editar '.$barrio->barrio_descripcion : 'Editar Barrio'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=barrio&a=index">Barrio Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $barrio->barrio_codigo != null ? 'Editar '.$barrio->barrio_descripcion : 'Editar Barrio'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-barrio"
            action="?c=barrio&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="barrio_codigo"
                value="<?php echo $barrio->barrio_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="barrio_descripcion"
                    value="<?php echo $barrio->barrio_descripcion; ?>"
                    class="form-control"
                    placeholder="Vista Alegre"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Ciudad</label>
                <select
                    name="ciudad_codigo"
                    class="custom-select d-block w-100"
                    required
                >
                    <option value="">Seleccione una Ciudad</option>
                    <?php foreach ($ciudades as $ciudad): ?>
                        <option value="<?php echo $ciudad->ciudad_codigo; ?>">
                            <?php echo $ciudad->ciudad_descripcion; ?>
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
        $("#frm-barrio").submit(function () {
            return $(this).validate();
        });
    })
</script>