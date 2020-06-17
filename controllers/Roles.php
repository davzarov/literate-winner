<?php
    require_once('models/usuario.php');
    require_once('models/persona.php');

    class RolController {
        private $rol_model;

        public function __CONSTRUCT()
        {
            $this->usuario_model = new Usuario();
            $this->persona_model = new Persona();
            $this->rol_model = new Rol();
        }

        public function index()
        {
            $roles = $this->rol_model->Listar();
            require_once('views/roles/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['rol_codigo']))
                return view('home', 'error');
            $rol = $this->rol_model->Obtener($_GET['rol_codigo']);
            $usuarios = $this->usuario_model->Listar();
            $personas = $this->persona_model->Listar();
            require_once('views/roles/editar.php');
        }

        public function nuevo()
        {
            $rol = new Rol();
            $usuarios = $this->usuario_model->Listar();
            $personas = $this->persona_model->Listar();
            require_once('views/roles/nuevo.php');
        }

        public function guardar()
        {
            $rol = new Rol();
            $rol->rol_descripcion = $_POST['rol_descripcion'];
            $rol->usuario_codigo = $_POST['usuario_codigo'];
            $rol->persona_codigo = $_POST['persona_codigo'];
            $this->rol_model->Registrar($rol);
            header("location: index.php?c=roles&a=index");
        }

        public function editar()
        {
            $rol = new Rol();
            $rol->rol_codigo = $_POST['rol_codigo'];
            $rol->rol_descripcion = $_POST['rol_descripcion'];
            $rol->usuario_codigo = $_POST['usuario_codigo'];
            $rol->persona_codigo = $_POST['persona_codigo'];
            $this->rol_model->Actualizar($rol);
            header("location: index.php?c=roles&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['rol_codigo']))
                return view('home', 'error');
            $this->rol_model->Eliminar($_GET['rol_codigo']);
            header("location: index.php?c=roles&a=index");
        }
    }