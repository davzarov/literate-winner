<?php
    require_once('models/pais.php');

    class DepartamentoController {
        private $departamento_model;

        public function __CONSTRUCT()
        {
            $this->pais_model = new Pais();
            $this->departamento_model = new Departamento();
        }

        public function index()
        {
            $departamentos = $this->departamento_model->Listar();
            require_once('views/departamento/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['departamento_codigo']))
                return view('home', 'error');
            $departamento = $this->departamento_model->Obtener($_GET['departamento_codigo']);
            $paises = $this->pais_model->Listar();
            require_once('views/departamento/editar.php');
        }

        public function nuevo()
        {
            $departamento = new Departamento();
            $paises = $this->pais_model->Listar();
            require_once('views/departamento/nuevo.php');
        }

        public function guardar()
        {
            $departamento = new Departamento();
            $departamento->departamento_descripcion = $_POST['departamento_descripcion'];
            $departamento->pais_codigo = $_POST['pais_codigo'];
            $this->departamento_model->Registrar($departamento);
            header("location: index.php?c=departamento&a=index");
        }

        public function editar()
        {
            $departamento = new Departamento();
            $departamento->departamento_codigo = $_POST['departamento_codigo'];
            $departamento->departamento_descripcion = $_POST['departamento_descripcion'];
            $departamento->pais_codigo = $_POST['pais_codigo'];
            $this->departamento_model->Actualizar($departamento);
            header("location: index.php?c=departamento&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['departamento_codigo']))
                return view('home', 'error');
            $this->departamento_model->Eliminar($_GET['departamento_codigo']);
            header("location: index.php?c=departamento&a=index");
        }
    }