<?php
    require_once('models/menu.php');

    class SubmenuController {
        private $submenu_model;

        public function __CONSTRUCT()
        {
            $this->menu_model = new Menu();
            $this->submenu_model = new Submenu();
        }

        public function index()
        {
            $submenus = $this->submenu_model->Listar();
            require_once('views/submenu/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['submenu_codigo']))
                return view('home', 'error');
            $submenu = $this->submenu_model->Obtener($_GET['submenu_codigo']);
            $menus = $this->menu_model->Listar();
            require_once('views/submenu/editar.php');
        }

        public function nuevo()
        {
            $submenu = new Submenu();
            $menus = $this->menu_model->Listar();
            require_once('views/submenu/nuevo.php');
        }

        public function guardar()
        {
            $submenu = new Submenu();
            $submenu->submenu_descripcion = $_POST['submenu_descripcion'];
            $submenu->submenu_enlace = $_POST['submenu_enlace'];
            $submenu->menu_codigo = $_POST['menu_codigo'];
            $this->submenu_model->Registrar($submenu);
            header("location: index.php?c=submenu&a=index");
        }

        public function editar()
        {
            $submenu = new Submenu();
            $submenu->submenu_codigo = $_POST['submenu_codigo'];
            $submenu->submenu_descripcion = $_POST['submenu_descripcion'];
            $submenu->submenu_enlace = $_POST['submenu_enlace'];
            $submenu->menu_codigo = $_POST['menu_codigo'];
            $this->submenu_model->Actualizar($submenu);
            header("location: index.php?c=submenu&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['submenu_codigo']))
                return view('home', 'error');
            $this->submenu_model->Eliminar($_GET['submenu_codigo']);
            header("location: index.php?c=submenu&a=index");
        }
    }