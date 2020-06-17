<?php

    class PaisController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new Pais();
        }

        public function index()
        {
            $paises = $this->model->Listar();
            require_once('views/pais/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['pais_codigo']))
                return view('home', 'error');
            $pais = $this->model->Obtener($_GET['pais_codigo']);
            require_once('views/pais/editar.php');
        }

        public function nuevo()
        {
            $pais = new Pais();
            require_once('views/pais/nuevo.php');
        }

        public function guardar()
        {
            $pais = new Pais();
            $pais->pais_descripcion = $_POST['pais_descripcion'];
            $this->model->Registrar($pais);
            header("location: index.php?c=pais&a=index");
        }

        public function editar()
        {
            $pais = new Pais();
            $pais->pais_codigo = $_POST['pais_codigo'];
            $pais->pais_descripcion = $_POST['pais_descripcion'];
            $this->model->Actualizar($pais);
            header("location: index.php?c=pais&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['pais_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['pais_codigo']);
            header("location: index.php?c=pais&a=index");
        }
    }