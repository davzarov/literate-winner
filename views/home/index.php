<?php require APP_ROOT.'/views/layout_upper.php'; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
    <?php foreach ($context['menus'] as $menu): ?>
        <div class="col-xs-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="<?php echo $menu->menu_enlace; ?>" class="card-body text-decoration-none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php echo $menu->menu_descripcion; ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php // echo $menu->menu_codigo; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-arrow-right fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require APP_ROOT.'/views/layout_under.php'; ?>