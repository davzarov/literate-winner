<?php
    class Submenus extends Controller {

        private $menuModel;
        private $submenuModel;

        public function __CONSTRUCT()
        {
            $this->menuModel = $this->model('Menu');
            $this->submenuModel = $this->model('Submenu');
        }

        public function index()
        {
            $context = [
                'submenus' => $this->submenuModel->Listar()
            ];
            $this->view('submenu/index', $context);
        }

        public function ver($submenu_codigo)
        {
            $submenu = $this->submenuModel->Obtener($submenu_codigo);
            $context = [
                'submenu' => $submenu,
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('submenu/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'submenu' => new Submenu(),
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('submenu/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $submenu = new Submenu();
                $submenu->submenu_descripcion = $_POST['submenu_descripcion'];
                $submenu->submenu_enlace = $_POST['submenu_enlace'];
                $submenu->menu_codigo = $_POST['menu_codigo'];

                if($this->submenuModel->Registrar($submenu)) {
                    flash('submenu_mensaje', 'Se ha agregado correctamente.');
                    redirect('submenus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($submenu_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $submenu = new Submenu();
                $submenu->submenu_codigo = $submenu_codigo;
                $submenu->submenu_descripcion = $_POST['submenu_descripcion'];
                $submenu->submenu_enlace = $_POST['submenu_enlace'];
                $submenu->menu_codigo = $_POST['menu_codigo'];

                if($this->submenuModel->Actualizar($submenu)) {
                    flash('submenu_mensaje', 'Se ha modificado correctamente.');
                    redirect('submenus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($submenu_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->submenuModel->Eliminar($submenu_codigo)) {
                    flash('submenu_mensaje', 'Se ha eliminado correctamente.');
                    redirect('submenus');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }