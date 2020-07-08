<?php
    class Usuarios extends Controller {
        
        private $usuarioModel;

        public function __CONSTRUCT()
        {
            $this->usuarioModel = $this->model('Usuario');
        }

        public function index()
        {
            $context = [
                'usuarios' => $this->usuarioModel->Listar()
            ];
            $this->view('usuario/index', $context);
        }

        public function ver($usuario_codigo)
        {
            $context = [
                'usuario' => $this->usuarioModel->Obtener($usuario_codigo)
            ];
            $this->view('usuario/editar', $context);
        }

        public function crearSesion($usuario)
        {
            // guardamos las siguientes variables en sesión
            $_SESSION['usuario_codigo'] = $usuario->usuario_codigo;
            $_SESSION['usuario_login'] = $usuario->usuario_login;
            // redireccionamos a inicio
            redirect('home/index');
        }

        public function tieneSesion()
        {
            // si el usuario tiene sesión activa
            if(isset($_SESSION['usuario_codigo'])) {
                return true;
            } else {
                return false;
            }
        }

        public function ingresar()
        {
            // si el usuario tiene sesión
            if($this->tieneSesion()) {
                // lo redireccionamos al inicio
                redirect('home/index');
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $credenciales = [
                    'usuario_login' => $_POST['usuario_login'];
                    'usuario_password' => $_POST['usuario_password'];
                ];
                // si el usuario existe
                if($this->usuarioModel->ExisteUsuario($credenciales['usuario_login'])) {
                    // autenticamos el usuario
                    $usuarioAutenticado = $this->usuarioModel->Autenticar(
                        $credenciales['usuario_login'],
                        $credenciales['usuario_password']
                    );
                    // si tenemos el usuario autenticado
                    if($usuarioAutenticado) {
                        // creamos la sesion de usuario
                        $this->crearSesion($usuarioAutenticado);
                    } else {
                        flash('mensaje_flash', 'La contraseña no es correcta.');
                        die;
                    }
                } else {
                    flash('mensaje_flash', 'El usuario no existe.');
                    die;
                }
            } else {
                $context = [
                    'usuario' => new Usuario()
                ];
                $this->view('usuario/ingresar', $context);
            }
        }

        public function salir()
        {
            unset($_SESSION['usuario_codigo']);
            unset($_SESSION['usuario_login']);
            session_destroy()
            redirect('usuario/ingresar');
        }

        public function nuevo()
        {
            $context = [
                'usuario' => new Usuario()
            ];
            $this->view('usuario/nuevo', $context);
        }

        public function guardar()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $usuario = new Usuario();
                $usuario->usuario_login = $_POST['usuario_login'];
                $usuario->usuario_password = $_POST['usuario_password'];

                if ($_POST['usuario_password'] === $_POST['usuario_password_confirmacion']) {
                    if($this->usuarioModel->Registrar($usuario)) {
                        flash('mensaje_flash', 'Se ha agregado correctamente.');
                        redirect('usuarios');
                    } else {
                        die('Ha ocurrido un error.');
                    }
                } else {
                    flash('mensaje_flash', 'Las contraseñas no coinciden.');
                    die;
                }
            }
        }

        public function editar($usuario_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // usuario a modificar
                $usuario = $this->usuarioModel->Obtener($usuario_codigo);
                // usuario modificado
                $usuario_modificado = new Usuario();
                $usuario_modificado->usuario_codigo = $usuario_codigo;
                $usuario_modificado->usuario_login = $_POST['usuario_login'];
                $usuario_modificado->usuario_password = $_POST['usuario_password'];
    
                if (password_verify($_POST['usuario_password_anterior'], $usuario->usuario_password)) {
                    if ($_POST['usuario_password'] === $_POST['usuario_password_confirmacion']) {
    
                        if($this->usuarioModel->Actualizar($usuario_modificado)) {
                            flash('mensaje_flash', 'Se ha modificado correctamente.');
                            redirect('usuarios');
                        } else {
                            die('Ha ocurrido un error.');
                        }
                    } else {
                        flash('mensaje_flash', 'Las contraseñas no coinciden.');
                        redirect('usuarios/editar/'.$usuario->usuario_codigo);
                        die;
                    }
                } else {
                    flash('mensaje_flash', 'Su contraseña anterior no es correcta.');
                    redirect('usuarios/editar/'.$usuario->usuario_codigo);
                    die;
                }
            }
        }

        public function eliminar($usuario_codigo)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->usuarioModel->Eliminar($usuario_codigo)) {
                    flash('mensaje_flash', 'Se ha eliminado correctamente.');
                    redirect('usuarios');
                } else {
                    die('Ha ocurrido un error.');
                }
            }
        }
    }