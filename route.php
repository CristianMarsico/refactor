   <?php
    include 'controllers/home.controller.php';
    include 'controllers/auth.controller.php';
    include 'controllers/user.controller.php';
    include 'controllers/band.controller.php';
    include 'controllers/genres.controller.php';

    define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

    $action = $_GET['action'];

    if ($action == '') {
        $action = 'home';
    }

    $parametro = explode('/', $action);

    switch ($parametro[0]) {
        case 'home':
            //----CREO UN OBJETO Y LO INSTANCIO EN LA CLASE GETCONTROLLER             
            $controller = new HomeController(); //------>llamo del controlador a la clase especifica donde van a estar las funciones
            $controller->showHome(); //----> accedo a lo que tiene la función
            break;
        case 'bandas':
            $controller = new HomeController();
            $controller->showBands();
            break;
        case 'generos':
            $controller = new HomeController();
            $controller->showGenres();
            break;
        case 'generosmusicales': //------> Muestro lista solo por género musical
            $controller = new HomeController();
            $controller->CdsByGenres($parametro[1]);
            break;
        case 'detalles':
            $controller = new HomeController();
            $controller->showdetails($parametro[1]);
            break;

            /**
             * ADMIN
             */

        case 'showForm':
            $controller = new AuthController();
            $controller->showForm();
            break;

        case 'verify':
            $controller = new AuthController();
            $controller->verify();
            break;
        case 'registro':
            $controller = new AuthController();
            $controller->register();
            break;
        case 'newUser':
            $controller = new AuthController();
            $controller->verifyRegistry();
            break;
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;

        case 'tareas':
            $controller = new AuthController();
            $controller->adminOption();
            break;

            /**
             * ABM USERS
             */

        case 'ABMuser';
            $controller = new UserController();
            $controller->show_A_B_M_Users();
            break;

        case 'agregar_usuario';
            $controller = new UserController();
            $controller->addUser();
            break;

        case 'eliminar_usuario';
            $controller = new UserController();
            $controller->deleteUser($parametro[1]);
            break;

        case 'editar_usuario';
            $controller = new UserController();
            $controller->editUser($parametro[1]);
            break;

            /**
             * AMB BANDAS
             */

        case 'ABMbandas';
            $controller = new BandsController();
            $controller->show_A_B_M_Bands();
            break;
        case 'agregar_banda':
            $controller = new BandsController();
            $controller->addBand();
            break;
        case 'guardar_banda';
            $controller = new BandsController();
            $controller->save();
            break;
        case 'eliminar_banda':
            $controller = new BandsController();
            $controller->delete($parametro[1]);
            break;
        case 'editar_banda':
            $controller = new BandsController();
            $controller->edit($parametro[1]);
            break;
        case 'guardar_edicion_banda':
            $controller = new BandsController();
            $controller->save_edit_band();
            break;

            /**
             *ABM GENEROS 
             */

        case 'ABMgeneros';
            $controller = new GenresController();
            $controller->A_B_M_Genres();
            break;
        case 'agregar_genero';
            $controller = new GenresController();
            $controller->addGenre();
            break;
        case 'guardar_genero';
            $controller = new GenresController();
            $controller->save();
            break;
        case 'eliminar_genero';
            $controller = new GenresController();
            $controller->delete($parametro[1]);
            break;
        case 'editar_genero';
            $controller = new GenresController();
            $controller->edit($parametro[1]);
            break;
        case 'guardar_edicion_genero';
            $controller = new GenresController();
            $controller->saveEdit();
            break;











        default:
            echo 'error';
             $controller = new HomeController();
             $controller->showError("operacion desconocida", "images/cds/error.jpg");
            break;
    }
