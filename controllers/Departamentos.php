<?php
    class Departamentos extends Controller {
    
        private $paisModel;
        private $departamentoModel;

        public function __CONSTRUCT()
        {
            $this->paisModel = $this->model('Pais');
            $this->departamentoModel = $this->model('Departamento');
        }

        public function index()
        {
            $context = [
                'departamentos' => $this->departamentoModel->Listar()
            ];
            $this->view('departamento/index', $context);
        }

        public function departamentosPorPais($pais_codigo)
        {
            die(json_encode($this->departamentoModel->ListarPorPais($pais_codigo)));
        }

        public function ver($departamento_codigo)
        {
            $departamento = $this->departamentoModel->Obtener($departamento_codigo);
            $context = [
                'departamento' => $departamento,
                'paises' => $this->paisModel->Listar()
            ];
            $this->view('departamento/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'departamento' => new Departamento(),
                'paises' => $this->paisModel->Listar()
            ];
            $this->view('departamento/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $departamento = new Departamento();
                $departamento->departamento_descripcion = $_POST['departamento_descripcion'];
                $departamento->pais_codigo = $_POST['pais_codigo'];
                if($this->departamentoModel->Registrar($departamento)) {
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('departamentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($departamento_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $departamento = new Departamento();
                $departamento->departamento_codigo = $departamento_codigo;
                $departamento->departamento_descripcion = $_POST['departamento_descripcion'];
                $departamento->pais_codigo = $_POST['pais_codigo'];

                if($this->departamentoModel->Actualizar($departamento)){
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('departamentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($departamento_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->departamentoModel->Eliminar($departamento_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('departamentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }