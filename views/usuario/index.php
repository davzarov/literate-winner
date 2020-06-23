<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Alta de Usuarios</h1>
    <a
        href="<?php echo URL_ROOT; ?>/usuarios/nuevo"
        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
    >
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Password</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Password</th>
                <th>Opciones</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($context['usuarios'] as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->usuario_codigo ?></td>
                    <td><?php echo $usuario->usuario_login ?></td>
                    <td><?php echo str_repeat('*', strlen(substr($usuario->usuario_password, 4, 8))) ?></td>
                    <td>
                        <a
                            class="btn btn-primary btn-icon-split btn-sm"
                            href="<?php echo URL_ROOT; ?>/usuarios/ver/<?php echo $usuario->usuario_codigo; ?>"
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
                            class="btn btn-danger btn-icon-split btn-sm confirm-modal"
                            data-toggle="modal"
                            data-action="<?php echo URL_ROOT; ?>/usuarios/eliminar/<?php echo $usuario->usuario_codigo; ?>"
                            href="#confirmModal"
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
<script>
    $(document).ready(function () {
        $('#confirmModal').on('show.bs.modal', function (event) {
            var action = $(event.relatedTarget).data('action');
            var modal = $(this);
            modal.find('.modal-title').text('¿Seguro de eliminar este registro?');
            modal.find('.modal-body').text('Ésta acción es irreversible, confirme para seguir adelante.');
            modal.find('form').attr('action', action);
        });
    });
</script>
<?php require APP_ROOT.'/views/layout_under.php'; ?>