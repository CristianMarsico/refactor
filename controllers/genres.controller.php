<?php
require_once 'views/user.view.php';
require_once 'models/genre.model.php';

class GenresController
{
    private $view;
    private $model;
    private $admin;
    private $priority;
    private $session;

    public function __construct()
    {
        $this->model = new GenreModel;
        $this->view = new UserView;
        //  AuthHelper::checklogged();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }

    public function A_B_M_Genres()
    {
        AuthHelper::checklogged();
        $generos = $this->model->getAll();
        $this->view->showGenres($this->admin, $this->priority, $this->session, $generos);
    }

    public function addGenre()
    {
        AuthHelper::checklogged();
        $this->view->showAddGenres($this->admin, $this->priority, $this->session);
    }

    public function save()
    {
        AuthHelper::checklogged();
        $nombre = $_POST['nombre_genero'];
        $a = $this->model->get($nombre);
        if (empty($nombre)) {
            $this->view->showAddGenres($this->admin, $this->priority, $this->session, "Debe completar los campos");
            die();
        }
        if ($a) {
            $this->view->showAddGenres($this->admin, $this->priority, $this->session, "Ese genero ya existe en la BD");
            die();
        } else {
            $genero = $_POST['nombre_genero'];
            $this->model->insert($genero);
            header('Location: ' . BASE_URL . 'ABMgeneros');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'ABMgeneros');
    }

    public function edit($id)
    {
        AuthHelper::checklogged();
        $id = $this->model->getId($id);
        $this->view->showFormEditGenres($this->admin, $this->priority, $this->session, $id);
    }

    public function saveEdit()
    {
        //$id = $this->model->getId($id);

        $id = $_POST['id_genero'];
        $nombre = $_POST['nombre_generos'];
       
        if (empty($nombre)) {
            $this->view->showFormEditGenres($this->admin, $this->priority, $this->session,$nombre, "los campos ya estan vacios");
        die;
        }

        $valor = $this->model->getGenre($nombre);
        if (!empty($nombre)) {
            $this->model->editGenre($id, $nombre);
            header('Location: ' . BASE_URL . "ABMgeneros");
        }
        if ($valor) {
            $this->view->showFormEditGenres($this->admin, $this->priority, $this->session, "ya existe ese genero");
        } 
       
    }
}
