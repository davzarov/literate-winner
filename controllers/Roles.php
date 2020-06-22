<?php
    class Roles extends Controller {

        private $usuarioModel;
        private $personaModel;
        private $rolModel;

        public function __CONSTRUCT()
        {
            $this->usuarioModel = $this->model('Usuario');
            $this->personaModel = $this->model('Persona');
            $this->rolModel = $this->model('Rol');
        }

        public function index()
        {
            $context = [
                'roles' => $this->rolModel->Listar()
            ];
            $this->view('roles/index', $context);
        }

        public function ver($rol_codigo)
        {
            $rol = $this->rolModel->Obtener($rol_codigo);
            $context = [
                'rol' => $rol,
                'usuarios' => $this->usuarioModel->Listar(),
                'personas' => $this->personaModel->Listar()
            ];
            $this->view('roles/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'rol' => new Rol(),
                'usuarios' => $this->usuarioModel->Listar(),
                'personas' => $this->personaModel->Listar()
            ];
            $this->view('roles/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $rol = new Rol();
                $rol->rol_descripcion = $_POST['rol_descripcion'];
                $rol->usuario_codigo = $_POST['usuario_codigo'];
                $rol->persona_codigo = $_POST['persona_codigo'];

                if($this->rolModel->Registrar($rol)) {
                    flash('roles_mensaje', 'Se ha agregado correctamente.');
                    redirect('roles');
                } else {
                    die('Ha ocurrido un error');
                }
            }
        }

        public function editar($rol_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $rol = new Rol();
                $rol->rol_codigo = $rol_codigo;
                $rol->rol_descripcion = $_POST['rol_descripcion'];
                $rol->usuario_codigo = $_POST['usuario_codigo'];
                $rol->persona_codigo = $_POST['persona_codigo'];

                if($this->rolModel->Actualizar($rol)) {
                    flash('roles_mensaje', 'Se ha modificado correctamente.');
                    redirect('roles');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($rol_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->rolModel->Eliminar($rol_codigo)) {
                    flash('roles_mensaje', 'Se ha eliminado correctamente.');
                    redirect('roles');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }