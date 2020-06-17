<?php
    class Barrios extends Controller {

        private $ciudadModel;
        private $barrioModel;

        public function __CONSTRUCT()
        {
            $this->ciudadModel = $this->model('Ciudad');
            $this->barrioModel = $this->model('Barrio');
        }

        public function index()
        {
            $context = [
                'barrios' => $this->barrioModel->Listar()
            ];
            $this->view('barrio/index', $context);
        }

        public function ver()
        {
            if (!isset($_GET['barrio_codigo']))
                redirect('barrios');
            $barrio = $this->barrioModel->Obtener($_GET['barrio_codigo']);
            $ciudades = $this->ciudadModel->Listar();
            require_once('views/barrio/editar.php');
        }

        public function nuevo()
        {
            $context = [
                'barrio' => new Barrio(),
                'ciudades' => $this->ciudadModel->Listar()
            ];
            $this->view('barrio/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $barrio = new Barrio();
                $barrio->barrio_descripcion = $_POST['barrio_descripcion'];
                $barrio->ciudad_codigo = $_POST['ciudad_codigo'];
                
                if($this->barrioModel->Registrar($barrio)) {
                    flash('barrio_mensaje', 'Se ha agregado correctamente.');
                    redirect('barrios');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $barrio = new Barrio();
                $barrio->barrio_codigo = $_POST['barrio_codigo'];
                $barrio->barrio_descripcion = $_POST['barrio_descripcion'];
                $barrio->ciudad_codigo = $_POST['ciudad_codigo'];

                if($this->barrioModel->Actualizar($barrio)) {
                    flash('barrio_mensaje', 'Se ha modificado correctamente.');
                    redirect('barrios');
                } else {
                    die('Ha ocurrido un error.');
                }
                
            }
        }

        public function eliminar()
        {
            if (!isset($_GET['barrio_codigo']))
                return view('home', 'error');
            $this->barrioModel->Eliminar($_GET['barrio_codigo']);
            header("location: index.php?c=barrio&a=index");
        }
    }