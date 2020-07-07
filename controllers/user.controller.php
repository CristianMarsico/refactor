<?php
require_once 'helpers/auth.helper.php';
require_once 'views/user.view.php';
require_once 'models/user.model.php';

class UserController
{
    private $model;
    private $view;
    private $admin;
    private $priority;
    private $session;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }

    public function show_A_B_M_Users()
    {
        AuthHelper::checklogged();


        $users = $this->model->getAll();
        $this->view->showUsers($this->admin, $users, $this->priority, $this->session);
    }

    public function addUser()
    {
        AuthHelper::checklogged();


        $users = $this->model->getAll();
        //$this->view->add($admin);

        if (empty($_POST['nombre']) || empty($_POST['prioridad']) || empty($_POST['pass'])) {
            $this->view->add($this->admin, "campos vacios", $this->priority, $this->session);
        } else {
            $nombre = $_POST['nombre'];
            $priority = $_POST['prioridad'];
            $pass = $_POST['pass'];
            if (isset($pass)) {
                $clave = $pass;
                $valor =  password_hash($clave, PASSWORD_DEFAULT);
                $this->model->insert($nombre, $priority, $valor);
            }
            header('Location: ' . BASE_URL . 'ABMuser');
        }
    }

    public function deleteUser($id)
    {
        AuthHelper::checklogged();

        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'ABMuser');
    }

    public function editUser($id)
    {
        AuthHelper::checklogged();
        if (
            !isset($_POST['nombre']) ||
            !isset($_POST['prioridad']) ||
            !isset($_POST['pass'])
        ) {
            $obtenerId = $this->model->get($id);
            $this->view->showEditUsers($this->admin, $obtenerId, "debe completar los campos", $this->priority, $this->session);
        } else {
            if (isset($_POST['pass'])) {
                $clave = $_POST['pass'];
                $valor =  password_hash($clave, PASSWORD_DEFAULT);
                $this->model->update($_POST['id_user'], $_POST['nombre'], $_POST['prioridad'], $valor);
            } else if ($this->admin && $this->priority != 1) {
                AuthHelper::checklogged();
            }

            header('Location: ' . BASE_URL . 'ABMuser');
        }
        // $obtenerId = $this->model->get($id);
        // $this->view->showEditUsers($admin, $obtenerId);
    }
}
