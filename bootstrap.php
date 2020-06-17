<?php
    // Cargamos el archivo de configuración
    require_once('config/config.php');

    // Cargamos las funciones de utilidad
    require_once('utils/messages.php');
    require_once('utils/urls.php');

    // Cargamos las librerías principales automáticamente
    spl_autoload_register(function ($className) {
        require_once('libraries/' . $className . '.php');
    });