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

        public function barriosPorCiudad($ciudad_codigo)
        {
            die(json_encode($this->barrioModel->ListarPorCiudad($ciudad_codigo)));
        }

        public function ver($barrio_codigo)
        {
            $barrio = $this->barrioModel->Obtener($barrio_codigo);
            $context = [
                'barrio' => $barrio,
                'ciudades' => $this->ciudadModel->Listar()
            ];
            $this->view('barrio/editar', $context);
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
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('barrios');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($barrio_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $barrio = new Barrio();
                $barrio->barrio_codigo = $barrio_codigo;
                $barrio->barrio_descripcion = $_POST['barrio_descripcion'];
                $barrio->ciudad_codigo = $_POST['ciudad_codigo'];

                if($this->barrioModel->Actualizar($barrio)) {
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('barrios');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($barrio_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->barrioModel->Eliminar($barrio_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('barrios');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }