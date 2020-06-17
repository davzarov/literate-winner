<?php
    class Home extends Controller {
        private $menuModel;

        public function __CONSTRUCT()
        {
            $this->menuModel = $this->model('Menu');
        }

        public function index() {
            $context = [
                'menus' => $this->menuModel->Listar()
            ];
            $this->view('home/index', $context);
        }
    }