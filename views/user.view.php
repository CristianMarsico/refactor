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

    public function addBand($bandas, $admin, $priority, $error = null, $session)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/addBand.tpl');
    }
}
