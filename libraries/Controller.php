<?php
    /*
     * Clase Controlador
     * Gestiona las vistas y modelos
     */
    class Controller {
        // Cargamos el modelo desde el controlador
        public function model($model)
        {
            // Importamos e instanciamos el modelo
            require_once('../models/' . $model . '.php');
            return new $model;
        }
        // Cargamos la vista desde el controlador
        public function view($view, $context=[])
        {
            // Verificamos si la vista existe
            if(file_exists('../views/' . $view . '.php')) {
                // Si existe, la importamos
                require_once('../views/' . $view . '.php');
            } else {
                die('La vista no existe');
            }
        }
    }