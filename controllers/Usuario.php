<?php

    class UsuarioController {
        private $model;

        public function __CONSTRUCT()
        {
            $this->model = new Usuario();
        }

        public function index()
        {
            $usuarios = $this->model->Listar();
            require_once('views/usuario/index.php');
        }

        public function ver()
        {
            if (!isset($_GET['usuario_codigo']))
                return view('home', 'error');
            $usuario = $this->model->Obtener($_GET['usuario_codigo']);
            require_once('views/usuario/editar.php');
        }

        public function nuevo()
        {
            $usuario = new Usuario();
            require_once('views/usuario/nuevo.php');
        }

        public function guardar()
        {
            $usuario = new Usuario();
            $usuario->usuario_login = $_POST['usuario_login'];
            $usuario->usuario_password = $_POST['usuario_password'];
            if ($_POST['usuario_password'] === $_POST['usuario_password_confirmacion']) {
                $this->model->Registrar($usuario);
            } else {
                echo(
                    "<script>
                    window.alert('Las contraseñas no coinciden');
                    window.location.href='index.php?c=usuario&a=nuevo';
                    </script>");
                die;
            }
            header("location: index.php?c=usuario&a=index");
        }

        public function editar()
        {
            // usuario a modificar
            $usuario = $this->model->Obtener($_POST['usuario_codigo']);
            // usuario modificado
            $usuario_modificado = new Usuario();
            $usuario_modificado->usuario_codigo = $_POST['usuario_codigo'];
            $usuario_modificado->usuario_login = $_POST['usuario_login'];
            $usuario_modificado->usuario_password = $_POST['usuario_password'];
            if (password_verify($_POST['usuario_password_anterior'], $usuario->usuario_password)) {
                if ($_POST['usuario_password'] === $_POST['usuario_password_confirmacion']) {
                    $this->model->Actualizar($usuario_modificado);
                } else {
                    echo(
                        "<script>
                        window.alert('Las contraseñas no coinciden');
                        window.location.href='index.php?c=usuario&a=ver&usuario_codigo=$usuario->usuario_codigo';
                        </script>");
                    die;
                }
            } else {
                echo(
                    "<script>
                    window.alert('Su contraseña anterior no es correcta.');
                    window.location.href='index.php?c=usuario&a=ver&usuario_codigo=$usuario->usuario_codigo';
                    </script>");
                    die;
            }
            header("location: index.php?c=usuario&a=index");
        }

        public function eliminar()
        {
            if (!isset($_GET['usuario_codigo']))
                return view('home', 'error');
            $this->model->Eliminar($_GET['usuario_codigo']);
            header("location: index.php?c=usuario&a=index");
        }
    }