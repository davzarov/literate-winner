<?php
    class HomeController {
        private $menu_model;

        public function __CONSTRUCT()
        {
            $this->menu_model = new Menu();
        }
        public function index() {
            $menus = $this->menu_model->Listar();
            require_once('views/home/index.php');
        }

        public function error() {
            require_once('views/home/error.php');
        }
    }