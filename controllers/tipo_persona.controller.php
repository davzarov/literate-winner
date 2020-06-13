<?php

    class TipoPersonaController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new TipoPersona();
        }

        public function index()
        {
            $tipo_personas = $this->model->Listar();
            require_once('views/tipo_persona/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['tipo_persona_codigo']))
                return view('home', 'error');
            $tipo_persona = $this->model->Obtener($_GET['tipo_persona_codigo']);
            require_once('views/tipo_persona/editar.php');
        }

        public function nuevo()
        {
            $tipo_persona = new TipoPersona();
            require_once('views/tipo_persona/nuevo.php');
        }

        public function guardar()
        {
            $tipo_persona = new TipoPersona();
            $tipo_persona->tipo_persona_descripcion = $_POST['tipo_persona_descripcion'];
            $this->model->Registrar($tipo_persona);
            header("location: index.php?c=tipo_persona&a=index");
        }

        public function editar()
        {
            $tipo_persona = new TipoPersona();
            $tipo_persona->tipo_persona_codigo = $_POST['tipo_persona_codigo'];
            $tipo_persona->tipo_persona_descripcion = $_POST['tipo_persona_descripcion'];
            $this->model->Actualizar($tipo_persona);
            header("location: index.php?c=tipo_persona&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['tipo_persona_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['tipo_persona_codigo']);
            header("location: index.php?c=tipo_persona&a=index");
        }
    }