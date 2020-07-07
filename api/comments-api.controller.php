<?php
require_once 'models/coment.model.php';
require_once 'api/api.view.php';

class CommentsApiController
{

    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model = new ComentsModel();
        $this->view = new APIview();
        $this->data = file_get_contents("php://input");
    }

    public function getData()
    {
        return json_decode($this->data);
    }

    public function getComments()
    {
        $a = $this->model->getAll();
        $this->view->response($a, 200);
    }

    public function getComment($params = [])
    {
        $id = $params[':ID'];
        $a = $this->model->get($id);
        if ($a)
            $this->view->response($a, 200);
        else
            $this->view->response("no existe la tarea", 200);
    }


    public function comment($params = [])
    {
        $id = $params[':ID'];
        $a = $this->model->a_comentary($id);
        if ($a)
            $this->view->response($a, 200);
        else
            $this->view->response("no existe el comentario con el id {$id}", 404);
    }

    public function delete($params = [])
    {
        $id = $params[':ID'];
        $a = $this->model->a_comentary($id);
        if (empty($a)) {
            $this->view->response("la tarea con el id número {$id} no existe", 404);
            die();
        }
        $this->model->delete($id);
        $this->view->response("la tarea con el id número {$id} ha sido borrada", 200);
    }

    public function add()
    {
        $body = $this->getData();
        var_dump($body); die;
       /* $comentario = $a->coments;
        $valor = $a->puntage;
        $id_user = $a->id_user_fk;
        $id_band = $a->id_band_fk;

        $id = $this->model->insert($comentario, $valor, $id_user, $id_band);*/
    }
}
