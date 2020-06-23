<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">
    <?php echo $context['submenu']->submenu_codigo != null ? 'Editar '.$context['submenu']->submenu_descripcion : 'Editar Submenu'; ?>
</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL_ROOT; ?>/submenus">Submenu Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <?php echo $context['submenu']->submenu_codigo != null ? 'Editar '.$context['submenu']->submenu_descripcion : 'Editar Submenu'; ?>
    </li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-submenu"
            action="<?php echo URL_ROOT; ?>/submenus/editar/<?php echo $context['submenu']->submenu_descripcion; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="hidden"
                name="submenu_codigo"
                value="<?php echo $context['submenu']->submenu_codigo; ?>"
            />
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="submenu_descripcion"
                    value="<?php echo $context['submenu']->submenu_descripcion; ?>"
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
                    value="<?php echo $context['submenu']->submenu_enlace; ?>"
                    class="form-control"
                    placeholder="http://localhost/sistemaua/nuevo"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Menu</label>
                <select
                    name="menu_codigo"
                    class="custom-select d-block w-100"
                >
                    <option value="">Seleccione un Menu</option>
                    <?php foreach ($context['menus'] as $menu): ?>
                        <option
                            value="<?php echo $menu->menu_codigo; ?>"
                            <?php if($menu->menu_codigo == $context['submenu']->menu_codigo):
                                echo("selected"); ?>
                            <?php endif; ?>
                        >
                            <?php echo $menu->menu_descripcion; ?>
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
        $("#frm-submenu").submit(function () {
            return $(this).validate();
        });
    })
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>