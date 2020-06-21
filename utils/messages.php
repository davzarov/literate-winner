<?php
    session_start();

    // Función para mostrar mensajes de Sesión
    function flash($name='', $message='', $class='alert alert-success')
    {
        if(!empty($name)) {
            // Si el mensaje no existe, lo creamos
            if(!empty($message) && empty($_SESSION[$name])) {
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            }
            // Si el mensaje existe, lo mostramos
        } elseif (!empty($_SESSION[$name]) && empty($message)) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'success';
            echo('<div class="' . $class . '" role="alert" id="msg-flash">' . $_SESSION[$name] . '</div>');
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }