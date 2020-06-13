<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo Submenu</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=submenu&a=index">Submenu Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Submenu</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-submenu"
            name="f1"
            action="?c=submenu&a=guardar"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="submenu_descripcion"
                    value="<?php echo $submenu->submenu_descripcion; ?>"
                    class="form-control"
                    placeholder="Menu Crear"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Enlace</label>
                <input
                    type="text"
                    name="submenu_enlace"
                    value="<?php echo $submenu->submenu_enlace; ?>"
                    class="form-control"
                    placeholder="http://localhost/uacrud/index.php?c=submenu&a=index"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Menu</label>
                <select
                    name="menu_codigo"
                    class="custom-select d-block w-100"
                    required
                >
                    <option value="">Seleccione un Menu</option>
                    <?php foreach ($menus as $menu): ?>
                        <option value="<?php echo $menu->menu_codigo; ?>">
                            <?php echo $menu->menu_descripcion; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
        $("#frm-submenu").submit(function () {
            return $(this).validate();
        });
    })
</script>
