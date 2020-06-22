<?php
    class Generos extends Controller {

        private $generoModel;

        public function __CONSTRUCT()
        {
            $this->generoModel = $this->model('Genero');
        }

        public function index()
        {
            $context = [
                'generos' => $this->generoModel->Listar()
            ];
            $this->view('genero/index', $context);
        }
        
        public function ver($genero_codigo)
        {
            $genero = $this->generoModel->Obtener($genero_codigo);
            $context = [
                'genero' => $genero
            ];
            $this->view('genero/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'genero' => new Genero()
            ];
            $this->view('genero/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $genero = new Genero();
                $genero->genero_descripcion = $_POST['genero_descripcion'];

                if($this->generoModel->Registrar($genero)) {
                    flash('genero_mensaje', 'Se ha agregado correctamente.');
                    redirect('generos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($genero_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $genero = new Genero();
                $genero->genero_codigo = $genero_codigo;
                $genero->genero_descripcion = $_POST['genero_descripcion'];

                if($this->generoModel->Actualizar($genero)) {
                    flash('genero_mensaje', 'Se ha modificado correctamente.');
                    redirect('generos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($genero_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->generoModel->Eliminar($genero_codigo)) {
                    flash('genero_mensaje', 'Se ha eliminado correctamente.');
                    redirect('generos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }