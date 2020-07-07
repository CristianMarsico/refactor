<?php
require_once 'views/home.view.php';
require_once 'models/bands.model.php';
class HomeController
{
    private $view;
    private $model;
    private $admin;
    private $priority;
    private $session;

    public function __construct()
    {
        $this->view = new HomeView();
        $this->model = new BandModel();
        $this->admin = AuthHelper::getUserName();
        $this->priority = AuthHelper::getUserPriority();
        $this->session = AuthHelper::session();
    }
    public function showHome()
    {
        
            $this->view->showHome($this->admin, $this->priority, $this->session);
        
    }

    public function showBands()
    {
        $bandas = $this->model->getAll();
        $this->view->showBands($bandas, $this->admin, $this->priority, $this->session);
    }

    public function showdetails($id_detalles){
        $id = AuthHelper::idUser();
        $valor = $this->model-> get($id_detalles);
        
        $canciones = $valor[0]->songs; //en una variable meto las canciones
        $temas = explode(",", $canciones);//hago un array de todas las canciones
        $this->view-> showDetails($valor, $temas, $this->admin, $this->priority, $id, $this->session);
    }
}
