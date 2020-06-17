<?php

    class TipoDocumentoController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new TipoDocumento();
        }

        public function index()
        {
            $tipo_documentos = $this->model->Listar();
            require_once('views/tipo_documento/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['tipo_documento_codigo']))
                return view('home', 'error');
            $tipo_documento = $this->model->Obtener($_GET['tipo_documento_codigo']);
            require_once('views/tipo_documento/editar.php');
        }

        public function nuevo()
        {
            $tipo_documento = new TipoDocumento();
            require_once('views/tipo_documento/nuevo.php');
        }

        public function guardar()
        {
            $tipo_documento = new TipoDocumento();
            $tipo_documento->tipo_documento_descripcion = $_POST['tipo_documento_descripcion'];
            $this->model->Registrar($tipo_documento);
            header("location: index.php?c=tipo_documento&a=index");
        }

        public function editar()
        {
            $tipo_documento = new TipoDocumento();
            $tipo_documento->tipo_documento_codigo = $_POST['tipo_documento_codigo'];
            $tipo_documento->tipo_documento_descripcion = $_POST['tipo_documento_descripcion'];
            $this->model->Actualizar($tipo_documento);
            header("location: index.php?c=tipo_documento&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['tipo_documento_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['tipo_documento_codigo']);
            header("location: index.php?c=tipo_documento&a=index");
        }
    }