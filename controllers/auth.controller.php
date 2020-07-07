<?php
require_once('views/auth.view.php');
require_once('models/auth.model.php');
require_once('models/user.model.php');
//require_once('helpers/auth.helper.php');
class AuthController
{
    private $model;
    private $view;
    private $admin;
    private $priority;
    private $session;
    private $userModel;


    public function __construct()
    {
        $this->model = new AuthModel();
        $this->userModel = new UserModel;
        $this->view = new AuthView();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }

    public function showForm()
    {
        $this->view->show_Form($this->priority, $this->session, $this->admin);
    }

    public function verify()
    {

        $username = $_POST['username'];
        $pass = $_POST['pass'];

        //traigo usuario solamente despues verifico el password.
        $user = $this->model->getUser($username);
        // var_dump($user);die;
        //$user si tiene objeto adentro da TRUE, sinó FALSE. 
        if ($user && ($pass == password_verify($pass, $user->password))) {
            AuthHelper::login($user);

            if ($_SESSION['USERNAME'] && $_SESSION['PRIORITY'] != 1) {
                AuthHelper::checklogged();
                $this->view->show_Form($this->priority, $this->session, $this->admin, "Ud no tiene el nivel de acceso requerido");
            } else {
                $this->view->accessGranted($this->admin, $this->priority, $this->session);
            }
        } else {
            $this->view->show_Form($this->priority, $this->session, $this->admin, "datos invalidos");
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['USERNAME']);
        unset($_SESSION['PRIORITY']);
        session_destroy();
        header('location: ' . BASE_URL . 'home');
    }

    public function adminOption()
    {
        AuthHelper::checklogged();
        $this->view->choseTask($this->admin, $this->priority, $this->session);
    }

    public function register()
    {
        $this->view->viewFormRegistry($this->admin, $this->priority, $this->session);
    }
    public function PasswordSegurity($password){
        $clave = $password;
        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
        return $clave_encriptada; 
    }
    public function verifyRegistry()
    {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña1'];
        $contraseña2 = $_POST['contraseña2'];

        $user = $this->userModel->users($usuario);
        if ($user) {
            $this->view->ViewFormRegistry($this->admin, $this->priority, $this->session, 'Usuario ya existente');
            die();
        }
        if ($contraseña != $contraseña2) {
            $this->view->ViewFormRegistry($this->admin, $this->priority, $this->session, 'Las contraseñas no son iguales');
            die();
        }

        if (!empty($usuario) && !empty($contraseña)) {
            $password = $this->PasswordSegurity($contraseña);
        }else {
            $this->view->ViewFormRegistry($this->admin, $this->priority, $this->session,'Datos incompletos');
            die(); 
        }
        if(!empty($password)){
            $newuser = $this->userModel->new($usuario, $password, 2);
        }else {
            $this->view->ViewFormRegistry($this->admin, $this->priority, $this->session,'Ha ocurrido un error');
            die(); 
        }
        if($newuser){
            $this->verifyUser($usuario, $contraseña);
            header("Location: " . BASE_URL . 'home');
        }   
    }

    public function verifyUser($usuario, $password){
        $user = $this->userModel->users($usuario);
       // var_dump($user);die;
        if ($user && $password==password_verify($password, $user->password)){
            AuthHelper::login($user);
            return true;
        } else {
            return false; 
        }
    }
}
