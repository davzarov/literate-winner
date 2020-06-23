<?php
    class Personas extends Controller {

        private $tipoPersonaModel;
        private $tipoDocumentoModel;
        private $generoModel;
        private $barrioModel;
        private $personaModel;

        public function __CONSTRUCT()
        {
            $this->tipoPersonaModel = $this->model('TipoPersona');
            $this->tipoDocumentoModel = $this->model('TipoDocumento');
            $this->generoModel = $this->model('Genero');
            $this->barrioModel = $this->model('Barrio');
            $this->personaModel = $this->model('Persona');
        }

        public function index()
        {
            $context = [
                'personas' => $this->personaModel->Listar()
            ];
            $this->view('persona/index', $context);
        }

        public function ver($persona_codigo)
        {
            $persona = $this->personaModel->Obtener($persona_codigo);
            $context = [
                'persona' => $persona,
                'tipos_persona' => $this->tipoPersonaModel->Listar(),
                'tipos_documento' => $this->tipoDocumentoModel->Listar(),
                'generos' => $this->generoModel->Listar(),
                'barrios' => $this->barrioModel->Listar()
            ];
            $this->view('persona/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'persona' => new Persona(),
                'tipos_persona' => $this->tipoPersonaModel->Listar(),
                'tipos_documento' => $this->tipoDocumentoModel->Listar(),
                'generos' => $this->generoModel->Listar(),
                'barrios' => $this->barrioModel->Listar()
            ];
            $this->view('persona/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $persona = new Persona();
                $persona->persona_nombre1 = $_POST['persona_nombre1'];
                $persona->persona_nombre2 = $_POST['persona_nombre2'];
                $persona->persona_apellido1 = $_POST['persona_apellido1'];
                $persona->persona_apellido2 = $_POST['persona_apellido2'];
                $persona->tipo_persona_codigo = $_POST['tipo_persona_codigo'];
                $persona->tipo_documento_codigo = $_POST['tipo_documento_codigo'];
                $persona->genero_codigo = $_POST['genero_codigo'];
                $persona->barrio_codigo = $_POST['barrio_codigo'];

                if($this->personaModel->Registrar($persona)) {
                    flash('mensaje_flash', 'Se ha agregado correctamente.');
                    redirect('personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($persona_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $persona = new Persona();
                $persona->persona_codigo = $persona_codigo;
                $persona->persona_nombre1 = $_POST['persona_nombre1'];
                $persona->persona_nombre2 = $_POST['persona_nombre2'];
                $persona->persona_apellido1 = $_POST['persona_apellido1'];
                $persona->persona_apellido2 = $_POST['persona_apellido2'];
                $persona->tipo_persona_codigo = $_POST['tipo_persona_codigo'];
                $persona->tipo_documento_codigo = $_POST['tipo_documento_codigo'];
                $persona->genero_codigo = $_POST['genero_codigo'];
                $persona->barrio_codigo = $_POST['barrio_codigo'];

                if($this->personaModel->Actualizar($persona)) {
                    flash('mensaje_flash', 'Se ha modificado correctamente.');
                    redirect('personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($persona_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->personaModel->Eliminar($persona_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('personas');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }