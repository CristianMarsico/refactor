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
        //  AuthHelper::checklogged();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }


    public function show_A_B_M_Bands()
    {
        AuthHelper::checklogged();

        $bands = $this->model->getAll();
        $this->view->showBands($this->admin, $bands, $this->priority, $this->session);
    }

    public function addBand()
    {
        AuthHelper::checklogged();

        $genre = $this->model_genre->getAll();
        $this->view->addBand($genre, $this->admin, $this->priority, $this->session);
    }

    public function save()
    {
        $genre = $this->model_genre->getAll();
        $nombre = $_POST['nombre'];
        $album = $_POST['album'];
        $cancion =  $_POST['canciones'];
        $año = $_POST['anio'];
        $genero = $_POST['genero'];

        $datos = $this->model->dates($nombre, $album);
        // var_dump($datos);die;
        if (empty($nombre) || empty($album)) {
            $this->view->addBand($genre, $this->admin, $this->priority, $this->session, "faltan datos");
            die();
        }
        if ($datos->name) {
            $this->view->addBand($genre, $this->admin, $this->priority, $this->session, "Ya existe ese nombre en la DB");
            die();
        }
        if ($datos->album) {
            $this->view->addBand($genre, $this->admin, $this->priority, $this->session, "Ya existe ese album en la DB");
            die();
        } else
            if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
            $exito = $this->model->insert($nombre, $album, $cancion, $año, $genero, $_FILES['input_name']['tmp_name']);
        } else {
            $exito = $this->model->insert($nombre, $album, $cancion, $año, $genero);
        }
        if ($exito) {
            header('Location: ' . BASE_URL . 'ABMbandas');
        } else {
            $this->view->addBand($genre, $this->admin, $this->priority, $this->session, "Faltan datos obligatorios");
            die();
        }
    }


    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'ABMbandas');
    }

    public function edit($id)
    {
        $genero = $this->model_genre->getAll();
        $datos = $this->model->get($id);
        //var_dump($obtenerId);die;
        $this->view->showFormEditForBands($this->admin, $this->priority, $this->session, $datos, $genero);
    }

    public function save_edit_band()
    {
        $idbanda = $_POST['id'];
        $nombre = $_POST['nombre'];
        $album = $_POST['album'];
        $cancion = $_POST['cancion'];
        $anio = $_POST['anio'];
        $genero = $_POST['genero'];

        if (empty($nombre) || empty($album) || empty($cancion) || empty($anio)) {
            $this->view->showFormEditForBands($this->admin, $this->priority, $this->session, "los campos estan vacios");
            die();
        } else {
            if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                $this->model->update($nombre, $album, $cancion, $anio, $genero, $idbanda, $_FILES['input_name']['tmp_name']);
            } else {
                $this->model->update($nombre, $album, $cancion, $anio, $genero, $idbanda);
            }


            header('Location: ' . BASE_URL . 'ABMbandas');
        }
        // $this->bandsModel->update( $_POST['nombre'], $_POST['album'], $_POST['cancion'], $_POST['anio'],$_POST['id'] );

        //header('Location: ' . BASE_URL . 'ABMbandas');
    }
}
