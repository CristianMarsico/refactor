<?php
require_once 'models/bands.model.php';
require_once 'views/user.view.php';
require_once 'views/home.view.php';
require_once 'models/genre.model.php';

class BandsController
{
    private $model;
    private $view;
    private $admin;
    private $priority;
    private $model_genre;
    private $session;

    public function __construct()
    {
        $this->model = new BandModel;
        $this->model_genre = new GenreModel;
        $this->view = new UserView;
        AuthHelper::checklogged();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }


    public function show_A_B_M_Bands()
    {
        $bands = $this->model->getAll();
        $this->view->showBands($this->admin, $bands, $this->priority,$this->session);
    }

    public function addBand()
    {
        $genre = $this->model_genre->getAll();
        // $this->view->addBand($genre, $this->admin, $this->priority);

        if (
            empty($_POST['nombre'])
            || empty($_POST['album'])
            || empty($_POST['canciones'])
            || empty($_POST['anio'])
            || empty($_POST['genero'])
        ) {
            $this->view->addBand($genre, $this->admin, $this->priority, "Faltan datos obligatorios", $this->session);
            die();
        }
        $nombre = $_POST['nombre'];
        $album = $_POST['album'];
        $cancion =  $_POST['canciones'];
        $año = $_POST['anio'];
        $genero = $_POST['genero'];
        if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
            $exito = $this->model->insert($nombre, $album, $cancion, $año, $genero, $_FILES['input_name']['tmp_name']);
        } else {
            $exito = $this->model->insert($nombre, $album, $cancion, $año, $genero);
        }
        if ($exito) {
            header('Location: ' . BASE_URL . 'ABMbandas');
        } else {
            $this->view->addBand($genre, $this->admin, $this->priority, "Faltan datos obligatorios", $this->session);
            die();
        }
    }
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'ABMbandas');
    }
}
