<?php
require_once('libs/smarty/Smarty.class.php');

class AuthView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('baseURL', BASE_URL);
    }

    public function show_Form($priority, $session, $admin, $error = null)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/show_Form.tpl');
    }

    public function accessGranted($admin, $priority, $session)
    {
        // var_dump($user);die;
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->display('templates/accessGranted.tpl');
    }

    public function choseTask($admin, $priority, $session){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->display('templates/choseTask.tpl');
    }

    public function viewFormRegistry($admin, $priority, $session, $error=null){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/userRegistry.tpl');
    }
}
