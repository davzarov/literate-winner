<?php

    class GeneroController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new Genero();
        }

        public function index()
        {
            $generos = $this->model->Listar();
            require_once('views/genero/index.php');
        }
        
        public function ver()
        {
            if (!isset($_GET['genero_codigo']))
                return view('home', 'error');
            $genero = $this->model->Obtener($_GET['genero_codigo']);
            require_once('views/genero/editar.php');
        }

        public function nuevo()
        {
            $genero = new Genero();
            require_once('views/genero/nuevo.php');
        }

        public function guardar()
        {
            $genero = new Genero();
            $genero->genero_descripcion = $_POST['genero_descripcion'];
            $this->model->Registrar($genero);
            header("location: index.php?c=genero&a=index");
        }

        public function editar()
        {
            $genero = new Genero();
            $genero->genero_codigo = $_POST['genero_codigo'];
            $genero->genero_descripcion = $_POST['genero_descripcion'];
            $this->model->Actualizar($genero);
            header("location: index.php?c=genero&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['genero_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['genero_codigo']);
            header("location: index.php?c=genero&a=index");
        }
    }