<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Alta de Tipos de Documento</h1>
    <a
        href="?c=tipo_documento&a=nuevo"
        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
    >
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tipos de Documento</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Código</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($tipo_documentos as $tipo_documento): ?>
                <tr>
                    <td><?php echo $tipo_documento->tipo_documento_codigo ?></td>
                    <td><?php echo $tipo_documento->tipo_documento_descripcion ?></td>
                    <td>
                        <a
                            class="btn btn-primary btn-icon-split btn-sm"
                            href="?c=tipo_documento&a=ver&tipo_documento_codigo=<?php echo $tipo_documento->tipo_documento_codigo; ?>"
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
                            href="?c=tipo_documento&a=eliminar&tipo_documento_codigo=<?php echo $tipo_documento->tipo_documento_codigo; ?>"
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