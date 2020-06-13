<?php
    require_once('models/departamento.php');

    class CiudadController {
        private $ciudad_model;

        public function __CONSTRUCT()
        {
            $this->departamento_model = new Departamento();
            $this->ciudad_model = new Ciudad();
        }

        public function index()
        {
            $ciudades = $this->ciudad_model->Listar();
            require_once('views/ciudad/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['ciudad_codigo']))
                return view('home', 'error');
            $ciudad = $this->ciudad_model->Obtener($_GET['ciudad_codigo']);
            $departamentos = $this->departamento_model->Listar();
            require_once('views/ciudad/editar.php');
        }

        public function nuevo()
        {
            $ciudad = new Ciudad();
            $departamentos = $this->departamento_model->Listar();
            require_once('views/ciudad/nuevo.php');
        }

        public function guardar()
        {
            $ciudad = new Ciudad();
            $ciudad->ciudad_descripcion = $_POST['ciudad_descripcion'];
            $ciudad->departamento_codigo = $_POST['departamento_codigo'];
            $this->ciudad_model->Registrar($ciudad);
            header("location: index.php?c=ciudad&a=index");
        }

        public function editar()
        {
            $ciudad = new Ciudad();
            $ciudad->ciudad_codigo = $_POST['ciudad_codigo'];
            $ciudad->ciudad_descripcion = $_POST['ciudad_descripcion'];
            $ciudad->departamento_codigo = $_POST['departamento_codigo'];
            $this->ciudad_model->Actualizar($ciudad);
            header("location: index.php?c=ciudad&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['ciudad_codigo']))
                return view('home', 'error');
            $this->ciudad_model->Eliminar($_GET['ciudad_codigo']);
            header("location: index.php?c=ciudad&a=index");
        }
    }