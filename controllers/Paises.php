<?php
    class Paises extends Controller {

        private $paisModel;

        public function __CONSTRUCT()
        {
            $this->paisModel = $this->model('Pais');
        }

        public function index()
        {
            $context = [
                'paises' => $this->paisModel->Listar()
            ];
            $this->view('pais/index', $context);
        }

        public function ver($pais_codigo)
        {
            $pais = $this->paisModel->Obtener($pais_codigo);
            $context = [
                'pais' => $pais
            ];
            $this->view('pais/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'pais' => new Pais()
            ];
            $this->view('pais/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $pais = new Pais();
                $pais->pais_descripcion = $_POST['pais_descripcion'];
                
                if($this->paisModel->Registrar($pais)) {
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('paises');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($pais_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $pais = new Pais();
                $pais->pais_codigo = $pais_codigo;
                $pais->pais_descripcion = $_POST['pais_descripcion'];

                if($this->paisModel->Actualizar($pais)) {
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('paises');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($pais_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->paisModel->Eliminar($pais_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('paises');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }