<?php
@session_start();

class Controller {
    
    protected $url;

    public function __construct() {
        
        $this->url = ROTA_GERAL;
        if ($this->checkLogado())
            {
                // $this->prepareDashboard();
            } 
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

    private function prepareDashboard() 
    {
        if(isset($_SESSION['acesso'])) {

           switch ($_SESSION['acesso']) {
            case 'administrador':
                require_once __DIR__ . "/../../Public/View/Administrativo/index.php";
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
}