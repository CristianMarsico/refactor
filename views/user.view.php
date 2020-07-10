<?php
require_once('libs/smarty/Smarty.class.php');
class UserView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('baseURL', BASE_URL);
    }

    public function showUsers($admin, $users, $priority, $session)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('users', $users);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/showUsers.tpl');
    }

    public function add($admin, $error = null, $priority, $session)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/addUser.tpl');
    }

    public function showEditUsers($admin, $id, $error = null, $priority, $session)
    {
        //var_dump($id);die;
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/showEditUsers.tpl');
    }

    public function showBands($admin, $bands, $priority, $session)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('bands', $bands);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/showBands.tpl');
    }

    public function addBand($bandas=null, $admin, $priority, $session, $error = null)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/addBand.tpl');
    }

    public function showFormEditForBands($admin, $priority,$session, $datos=null, $genero=null, $error=null){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('datos', $datos);
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormEditForBands.tpl');
    }
    public function showGenres($admin, $priority, $session, $generos)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/showGenres.tpl');
    }

    public function showAddGenres($admin, $priority, $session, $error=null){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/addGenres.tpl');
    }

    public function showFormEditGenres($admin, $priority, $session, $id, $error = null){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormEditGenres.tpl');
    }
}
