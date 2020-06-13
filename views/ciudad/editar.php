<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $ciudad->ciudad_codigo != null ? 'Editar '.$ciudad->ciudad_descripcion : 'Editar Ciudad'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=ciudad&a=index">Ciudad Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $ciudad->ciudad_codigo != null ? 'Editar '.$ciudad->ciudad_descripcion : 'Editar Ciudad'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-ciudad"
            action="?c=ciudad&a=editar"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="ciudad_codigo"
                value="<?php echo $ciudad->ciudad_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="ciudad_descripcion"
                    value="<?php echo $ciudad->ciudad_descripcion; ?>"
                    class="form-control"
                    placeholder="Central"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Departamento</label>
                <select
                    name="departamento_codigo"
                    class="custom-select d-block w-100"
                >
                    <option value="">Seleccione un Departamento</option>
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?php echo $departamento->departamento_codigo; ?>">
                            <?php echo $departamento->departamento_descripcion; ?>
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
        $("#frm-ciudad").submit(function () {
            return $(this).validate();
        });
    })
</script>