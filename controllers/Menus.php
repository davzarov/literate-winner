<?php
    class Menus extends Controller {

        private $menuModel;

        public function __CONSTRUCT()
        {
            $this->menuModel = $this->model('Menu');
        }

        public function index()
        {
            $context = [
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('menu/index', $context);
        }

        public function ver($menu_codigo)
        {
            $menu = $this->menuModel->Obtener($menu_codigo);
            $context = [
                'menu' => $menu
            ];
            $this->view('menu/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'menu' => new Menu()
            ];
            $this->view('menu/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $menu = new Menu();
                $menu->menu_descripcion = $_POST['menu_descripcion'];
                $menu->menu_enlace = $_POST['menu_enlace'];

                if($this->menuModel->Registrar($menu)) {
                    flash('menu_mensaje', 'Se ha agregado correctamente.');
                    redirect('menus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($menu_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $menu = new Menu();
                $menu->menu_codigo = $menu_codigo;
                $menu->menu_descripcion = $_POST['menu_descripcion'];
                $menu->menu_enlace = $_POST['menu_enlace'];
                
                if($this->menuModel->Actualizar($menu)) {
                    flash('menu_mensaje', 'Se ha modificado correctamente.');
                    redirect('menus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($menu_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->menuModel->Eliminar($menu_codigo)) {
                    flash('menu_mensaje', 'Se ha eliminado correctamente.');
                    redirect('menus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }