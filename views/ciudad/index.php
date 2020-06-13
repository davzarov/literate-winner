<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Alta de Ciudades</h1>
    <a
        href="?c=ciudad&a=nuevo"
        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
    >
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ciudades</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Departamento</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Departamento</th>
                <th>Opciones</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?php echo $ciudad->ciudad_codigo ?></td>
                    <td><?php echo $ciudad->ciudad_descripcion ?></td>
                    <td><?php echo $ciudad->departamento_descripcion ?></td>
                    <td>
                        <a
                            class="btn btn-primary btn-icon-split btn-sm"
                            href="?c=ciudad&a=ver&ciudad_codigo=<?php echo $ciudad->ciudad_codigo; ?>"
                        >
                            <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">
                                Editar
                            </span>
                        </a>
                        &nbsp;
                        <a
                            class="btn btn-danger btn-icon-split btn-sm"
                            onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                            href="?c=ciudad&a=eliminar&ciudad_codigo=<?php echo $ciudad->ciudad_codigo; ?>"
                        >
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">
                                Eliminar
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>