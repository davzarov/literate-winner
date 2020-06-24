<?php
    class Home extends Controller {
        private $menuModel;

        public function __CONSTRUCT()
        {
            $this->menuModel = $this->model('Menu');
            $this->paisModel = $this->model('Pais');
        }

        public function index() {
            $context = [
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('home/index', $context);
        }

        public function entidades()
        {
            $context = [
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('home/entidades', $context);
        }

        public function localidades()
        {
            $context = [
                'paises' => $this->paisModel->Listar()
            ];
            $this->view('home/localidades', $context);
        }
    }