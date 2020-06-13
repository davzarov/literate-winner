<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema UA</title>
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <?php include_once('views/head.php'); ?>
    </head>
    <body id="page-top">
        <div class="wrapper">
            <?php // include_once('views/sidebar.php');?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                <?php include_once('views/topbar.php'); ?>
                    <div class="container-fluid">
                        <?php include_once('router.php'); ?>
                    </div>
                </div>
                <?php include_once('views/footer.php'); ?>
            </div>
        </div>
        <?php include_once('views/scroll_to_top.php'); ?>
        <?php include_once('views/confirm_modal.php'); ?>
        <?php include_once('views/scripts.php'); ?>
    </body>
</html>