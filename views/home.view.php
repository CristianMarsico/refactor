<?php
require_once('libs/smarty/Smarty.class.php');
class HomeView
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('baseURL', BASE_URL);
    }

    public function registro()
    {
        $this->smarty->display('templates/registro.tpl');
    }

    public function showHome($admin = null, $priority = null, $session)
    {
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);

        $this->smarty->display('templates/showHome.tpl');
    }

    public function showBands($bandas, $admin, $priority, $session)
    {

        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->display('templates/listaCompleta.tpl');
    }

    public function showDetails($valor, $temas, $admin, $priority, $id, $session)
    {
        $this->smarty->assign('valor', $valor);
        $this->smarty->assign('temas', $temas);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/details.tpl');
    }

    public function showAllGenres($admin, $priority, $session,$detalles){
        $this->smarty->assign('detalles', $detalles);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/showGeneros.tpl');
    }

    public function showBandsForGenres($admin, $priority, $session,$detalles){
        $this->smarty->assign('detalles', $detalles);
        $this->smarty->assign('priority', $priority);
        $this->smarty->assign('session', $session);
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/showBandsForGenres.tpl');
    }
    public function show_Error($msg = null)
    {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/show_Error.tpl');
    }
}
