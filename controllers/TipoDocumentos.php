<?php
    class TipoDocumentos extends Controller {

        private $tipoDocumentoModel;

        public function __CONSTRUCT()
        {
            $this->tipoDocumentoModel = $this->model('TipoDocumento');
        }

        public function index()
        {
            $context = [
                'tipo_documentos' => $this->tipoDocumentoModel->Listar()
            ];
            $this->view('tipo_documento/index', $context);
        }

        public function ver($tipo_documento_codigo)
        {
            $tipo_documento = $this->tipoDocumentoModel->Obtener($tipo_documento_codigo);
            $context = [
                'tipo_documento' => $tipo_documento
            ];
            $this->view('tipo_documento/editar', $context);
        }

        public function nuevo()
        {
            $context = [
                'tipo_documento' => new TipoDocumento()
            ];
            $this->view('tipo_documento/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $tipo_documento = new TipoDocumento();
                $tipo_documento->tipo_documento_descripcion = $_POST['tipo_documento_descripcion'];
               
                if($this->tipoDocumentoModel->Registrar($tipo_documento)) {
                    flash('tipo_documento_mensaje', 'Se ha agregado correctatmente.');
                    redirect('tipo_documentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function editar($tipo_documento_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $tipo_documento = new TipoDocumento();
                $tipo_documento->tipo_documento_codigo = $tipo_documento_codigo;
                $tipo_documento->tipo_documento_descripcion = $_POST['tipo_documento_descripcion'];

                if($this->tipoDocumentoModel->Actualizar($tipo_documento)) {
                    flash('tipo_documento_mensaje', 'Se ha modificado correctamente.');
                    redirect('tipo_documentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }

        public function eliminar($tipo_documento_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->tipoDocumentoModel->Eliminar($tipo_documento_codigo)) {
                    flash('tipo_documento_mensaje', 'Se ha eliminado correctamente.');
                    redirect('tipo_documentos');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }