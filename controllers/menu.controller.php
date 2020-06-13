<?php

    class MenuController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new Menu();
        }

        public function index()
        {
            $menus = $this->model->Listar();
            require_once('views/menu/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['menu_codigo']))
                return view('home', 'error');
            $menu = $this->model->Obtener($_GET['menu_codigo']);
            require_once('views/menu/editar.php');
        }

        public function nuevo()
        {
            $menu = new Menu();
            require_once('views/menu/nuevo.php');
        }

        public function guardar()
        {
            $menu = new Menu();
            $menu->menu_descripcion = $_POST['menu_descripcion'];
            $menu->menu_enlace = $_POST['menu_enlace'];
            $this->model->Registrar($menu);
            header("location: index.php?c=menu&a=index");
        }

        public function editar()
        {
            $menu = new Menu();
            $menu->menu_codigo = $_POST['menu_codigo'];
            $menu->menu_descripcion = $_POST['menu_descripcion'];
            $menu->menu_enlace = $_POST['menu_enlace'];
            $this->model->Actualizar($menu);
            header("location: index.php?c=menu&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['menu_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['menu_codigo']);
            header("location: index.php?c=menu&a=index");
        }
    }