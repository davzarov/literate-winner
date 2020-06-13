<?php
    require_once('models/ciudad.php');

    class BarrioController {
        private $barrio_model;

        public function __CONSTRUCT()
        {
            $this->ciudad_model = new Ciudad();
            $this->barrio_model = new Barrio();
        }

        public function index()
        {
            $barrios = $this->barrio_model->Listar();
            require_once('views/barrio/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['barrio_codigo']))
                return view('home', 'error');
            $barrio = $this->barrio_model->Obtener($_GET['barrio_codigo']);
            $ciudades = $this->ciudad_model->Listar();
            require_once('views/barrio/editar.php');
        }

        public function nuevo()
        {
            $barrio = new Barrio();
            $ciudades = $this->ciudad_model->Listar();
            require_once('views/barrio/nuevo.php');
        }

        public function guardar()
        {
            $barrio = new Barrio();
            $barrio->barrio_descripcion = $_POST['barrio_descripcion'];
            $barrio->ciudad_codigo = $_POST['ciudad_codigo'];
            $this->barrio_model->Registrar($barrio);
            header("location: index.php?c=barrio&a=index");
        }

        public function editar()
        {
            $barrio = new Barrio();
            $barrio->barrio_codigo = $_POST['barrio_codigo'];
            $barrio->barrio_descripcion = $_POST['barrio_descripcion'];
            $barrio->ciudad_codigo = $_POST['ciudad_codigo'];
            $this->barrio_model->Actualizar($barrio);
            header("location: index.php?c=barrio&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['barrio_codigo']))
                return view('home', 'error');
            $this->barrio_model->Eliminar($_GET['barrio_codigo']);
            header("location: index.php?c=barrio&a=index");
        }
    }