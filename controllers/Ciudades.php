<?php
    class Ciudades extends Controller {

        private $departamentoModel;
        private $ciudadModel;

        public function __CONSTRUCT()
        {
            $this->departamentoModel = $this->model('Departamento');
            $this->ciudadModel = $this->model('Ciudad');
        }

        public function index()
        {
            $context = [
                'ciudades' => $this->ciudadModel->Listar()
            ];
            $this->view('ciudad/index', $context);
        }

        public function ciudadesPorDepartamento($departamento_codigo)
        {
            die(json_encode($this->ciudadModel->ListarPorDepartamento($departamento_codigo)));
        }

        public function ver($ciudad_codigo)
        {
            $ciudad = $this->ciudadModel->Obtener($ciudad_codigo);
            $context = [
                'ciudad' => $ciudad,
                'departamentos' => $this->departamentoModel->Listar()
            ];
            $this->view('ciudad/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'ciudad' => new Ciudad(),
                'departamentos' => $this->departamentoModel->Listar()
            ];
            $this->view('ciudad/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $ciudad = new Ciudad();
                $ciudad->ciudad_descripcion = $_POST['ciudad_descripcion'];
                $ciudad->departamento_codigo = $_POST['departamento_codigo'];
                if($this->ciudadModel->Registrar($ciudad)) {
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('ciudades');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($ciudad_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $ciudad = new Ciudad();
                $ciudad->ciudad_codigo = $ciudad_codigo;
                $ciudad->ciudad_descripcion = $_POST['ciudad_descripcion'];
                $ciudad->departamento_codigo = $_POST['departamento_codigo'];

                if($this->ciudadModel->Actualizar($ciudad)) {
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('ciudades');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($ciudad_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->ciudadModel->Eliminar($ciudad_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('ciudades');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }