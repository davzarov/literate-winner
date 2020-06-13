<?php
    require_once 'database.php';

    if (isset($_GET['c']) && isset($_GET['a'])) {
        $controller = $_GET['c'];
        $action     = $_GET['a'];
    } else {
        $controller = 'home';
        $action     = 'index';
    }

    require_once 'views/layout.php';
?>