<?php
@session_start();

class Controller {
    
    protected $url;

    public function __construct() {
          
        $this->url = ROTA_GERAL;
        if ($this->checkLogado())
            {
                $this->prepareDashboard();
            } 
    }

    public function prepareView($view) 
    {
        require_once __DIR__ . "/../../Public/View/" . $view;
    }

    public function viewAdmin($painel,$view, $page = "dashboard") 
    {
        require_once __DIR__ . "/../../Public/View/{$painel}/" . $view . ".php";
    }

    public function prepareSite($view, $page = "home") 
    {
        require_once __DIR__ . "/../../Public/View/Site/" . $view . '.php';
    }

    public function loadSections($res) {
        
        if (is_null($res)) {
            return null;
        } 
        
        $_SESSION['logado']= true;
        $_SESSION['nome'] = $res['nome'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['acesso'] = $res['acesso'];
        $_SESSION['code'] = $res['id'];

        return true;
    }

    public function prepareDashboard() 
    {
        if(isset($_SESSION['acesso'])) {

           switch ($_SESSION['acesso']) {
            case 'administrador':
                $this->redirect($this->url . '/Administrativo/index');
                break;
           } 
        }
    }

    private function checkLogado() {
        if(isset($_SESSION['logado'])) {
            return $_SESSION['logado'];
        }

        return false;
    }
    
    public function redirect($url)
    {
        header(sprintf('Location: %s', $url));
        exit;
    }

    public function logouf() 
    {
        session_start();
        session_destroy();            
        $this->redirect($this->url.'/Login');    
        return;
    }
}