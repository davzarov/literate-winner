<?php
    require_once('models/tipo_persona.php');
    require_once('models/tipo_documento.php');
    require_once('models/genero.php');
    require_once('models/barrio.php');

    class PersonaController {
        private $persona_model;

        public function __CONSTRUCT()
        {
            $this->tipo_persona_model = new TipoPersona();
            $this->tipo_documento_model = new TipoDocumento();
            $this->genero_model = new Genero();
            $this->barrio_model = new Barrio();
            $this->persona_model = new Persona();
        }

        public function index()
        {
            $personas = $this->persona_model->Listar();
            require_once('views/persona/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['persona_codigo']))
                return view('home', 'error');
            $persona = $this->persona_model->Obtener($_GET['persona_codigo']);
            $tipos_persona = $this->tipo_persona_model->Listar();
            $tipos_documento = $this->tipo_documento_model->Listar();
            $generos = $this->genero_model->Listar();
            $barrios = $this->barrio_model->Listar();
            require_once('views/persona/editar.php');
        }

        public function nuevo()
        {
            $persona = new Persona();
            $tipos_persona = $this->tipo_persona_model->Listar();
            $tipos_documento = $this->tipo_documento_model->Listar();
            $generos = $this->genero_model->Listar();
            $barrios = $this->barrio_model->Listar();
            require_once('views/persona/nuevo.php');
        }

        public function guardar()
        {
            $persona = new Persona();
            $persona->persona_nombre1 = $_POST['persona_nombre1'];
            $persona->persona_nombre2 = $_POST['persona_nombre2'];
            $persona->persona_apellido1 = $_POST['persona_apellido1'];
            $persona->persona_apellido2 = $_POST['persona_apellido2'];
            $persona->tipo_persona_codigo = $_POST['tipo_persona_codigo'];
            $persona->tipo_documento_codigo = $_POST['tipo_documento_codigo'];
            $persona->genero_codigo = $_POST['genero_codigo'];
            $persona->barrio_codigo = $_POST['barrio_codigo'];
            $this->persona_model->Registrar($persona);
            header("location: index.php?c=persona&a=index");
        }

        public function editar()
        {
            $persona = new Persona();
            $persona->persona_codigo = $_POST['persona_codigo'];
            $persona->persona_nombre1 = $_POST['persona_nombre1'];
            $persona->persona_nombre2 = $_POST['persona_nombre2'];
            $persona->persona_apellido1 = $_POST['persona_apellido1'];
            $persona->persona_apellido2 = $_POST['persona_apellido2'];
            $persona->tipo_persona_codigo = $_POST['tipo_persona_codigo'];
            $persona->tipo_documento_codigo = $_POST['tipo_documento_codigo'];
            $persona->genero_codigo = $_POST['genero_codigo'];
            $persona->barrio_codigo = $_POST['barrio_codigo'];
            $this->persona_model->Actualizar($persona);
            header("location: index.php?c=persona&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['persona_codigo']))
                return view('home', 'error');
            $this->persona_model->Eliminar($_GET['persona_codigo']);
            header("location: index.php?c=persona&a=index");
        }
    }