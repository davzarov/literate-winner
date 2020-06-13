<?php
    function view($controller, $action) {
        require_once('controllers/' . $controller . '.controller.php');

        switch($controller) {
            case 'barrio':
                require_once('models/barrio.php');
                $controller = new BarrioController();
            break;
            case 'ciudad':
                require_once('models/ciudad.php');
                $controller = new CiudadController();
            break;
            case 'departamento':
                require_once('models/departamento.php');
                $controller = new DepartamentoController();
            break;
            case 'genero':
                require_once('models/genero.php');
                $controller = new GeneroController();
            break;
            case 'home':
                require_once('models/menu.php');
                $controller = new HomeController();
            break;
            case 'menu':
                require_once('models/menu.php');
                $controller = new MenuController();
            break;
            case 'pais':
                require_once('models/pais.php');
                $controller = new PaisController();
            break;
            case 'persona':
                require_once('models/persona.php');
                $controller = new PersonaController();
            break;
            case 'roles':
                require_once('models/roles.php');
                $controller = new RolController();
            break;
            case 'submenu':
                require_once('models/submenu.php');
                $controller = new SubmenuController();
            break;
            case 'tipo_documento':
                require_once('models/tipo_documento.php');
                $controller = new TipoDocumentoController();
            break;
            case 'tipo_persona':
                require_once('models/tipo_persona.php');
                $controller = new TipoPersonaController();
            break;
            case 'usuario':
                require_once('models/usuario.php');
                $controller = new UsuarioController();
            break;
        }
        $controller->{ $action }();
    }

    $controllers = array(
        'barrio' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'ciudad' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'departamento' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'genero' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'home' => ['index', 'error'],
        'menu' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'pais' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'persona' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'roles' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'submenu' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'tipo_documento' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'tipo_persona' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar'],
        'usuario' => ['index', 'ver', 'nuevo', 'guardar', 'editar', 'eliminar']
    );
    
    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            view($controller, $action);
        } else {
            view('home', 'error');
        }
    } else {
        view('home', 'error');
    }
?>