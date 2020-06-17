<?php
    // Función de redirección
    function redirect($page)
    {
        header('location: ' . URL_ROOT . '/' . $page);
    }