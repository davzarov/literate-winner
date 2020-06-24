<?php
    /*
     * Clase de Enrutamiento
     * Configura URL y carga Controladores y Métodos
     */
    class Router {
        protected $currentController = 'Home'; // Controlador por defecto
        protected $currentMethod = 'index'; // Método por defecto
        protected $params = []; // Parámetros vacíos por defecto

        public function __CONSTRUCT()
        {
            $url = $this->obtenerUrl();
            // if(strpos($url[0], '_') !== false) {
            //     separar por carácter encontrado, capitalizar y unir en una cadena
            // }
            // Buscar el controlador en el directorio de controladores
            if(is_array($url) && file_exists("../controllers/" . ucwords($url[0]) . '.php')) {
                // Si existe, lo asignamos como el controlador actual
                $this->currentController = ucwords($url[0]);
                // Destruímos el índice 0
                unset($url[0]);
            }
            // Importamos e instanciamos el controlador actual
            require_once("../controllers/" . $this->currentController . '.php');
            $this->currentController = new $this->currentController;
            // Verificamos si existe la porción del método en la url
            if(isset($url[1])) {
                // Verificamos si dicho método existe en el controlador
                if(method_exists($this->currentController, $url[1])) {
                    // Si existe, lo asignamos como el método actual
                    $this->currentMethod = $url[1];
                    // Destruímos el índice 1
                    unset($url[1]);
                }
            }
            // Si restan valores en la URL la asignamos como parámetros
            $this->params = $url ? array_values($url) : [];
            // Invocamos un callback con un array de parámetros
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
        // Armamos la URL a partir del superglobal GET
        public function obtenerUrl()
        {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }