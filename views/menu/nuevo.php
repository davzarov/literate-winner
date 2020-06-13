<!-- header -->
<h1 class="h3 mb-2 text-gray-800 mb-4">Nuevo Menu</h1>
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=menu&a=index">Menu Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Menu</li>
  </ol>
</nav>
<!-- form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            id="frm-menu"
            name="f1"
            action="?c=menu&a=guardar"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="form-group">
                <label>Descripción</label>
                <input
                    type="text"
                    name="menu_descripcion"
                    value="<?php echo $menu->menu_descripcion; ?>"
                    class="form-control"
                    placeholder="Menu"
                    data-validacion-tipo="requerido"
                />
            </div>
            <div class="form-group">
                <label>Enlace</label>
                <input
                    type="text"
                    name="menu_enlace"
                    value="<?php echo $menu->menu_enlace; ?>"
                    class="form-control"
                    placeholder="http://localhost/uacrud/index.php?c=menu&a=index"
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
        $("#frm-menu").submit(function () {
            return $(this).validate();
        });
    })
</script>
