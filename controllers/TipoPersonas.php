<?php
    class TipoPersonas extends Controller {

        private $tipoPersonaModel;

        public function __CONSTRUCT()
        {
            $this->tipoPersonaModel = $this->model('TipoPersona');
        }

        public function index()
        {
            $context = [
                'tipo_personas' => $this->tipoPersonaModel->Listar()
            ];
            $this->view('tipo_persona/index', $context);
        }

        public function ver($tipo_persona_codigo)
        {
            $tipo_persona = $this->tipoPersonaModel->Obtener($tipo_persona_codigo);
            $context = [
                'tipo_persona' => $tipo_persona
            ];
            $this->view('tipo_persona/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'tipo_persona' => new TipoPersona()
            ];
            $this->view('tipo_persona/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $tipo_persona = new TipoPersona();
                $tipo_persona->tipo_persona_descripcion = $_POST['tipo_persona_descripcion'];

                if($this->tipoPersonaModel->Registrar($tipo_persona)) {
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('tipo_personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($tipo_persona_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $tipo_persona = new TipoPersona();
                $tipo_persona->tipo_persona_codigo = $tipo_persona_codigo;
                $tipo_persona->tipo_persona_descripcion = $_POST['tipo_persona_descripcion'];

                if($this->tipoPersonaModel->Actualizar($tipo_persona)) {
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('tipo_personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($tipo_persona_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->tipoPersonaModel->Eliminar($tipo_persona_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('tipo_personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }