<?php

class AdministrativoController extends Controller{
    protected $app_model;
    protected $painel = "administrativo";

    public function __construct() {
        
        $this->validPainel();
    }

    private function validPainel() {        
        // if ($_SESSION['painel'] != 'Administrativo' && $_SESSION['painel'] != 'financeiro') {   
        //     session_start();
        //     session_destroy();            
        //     return header('Location: '.$this->url.'/Login');            
        // }       
    }

    public function index($param = null) {        
        if ($param != null) {
            $this->viewAdmin($this->painel,'index', $param);
            return;
        }
        
        $this->viewAdmin($this->painel,'index');
    }  

    public function vacina() {        
        $this->viewAdmin($this->painel,'index');
    }  

    public function changeStatusBg($code) {
        $bg = $this->app_model->changeStatusBg($code);
        return $bg;
    }

    public function changeStatusBgGet($code) {
        $bg = $this->app_model->changeStatusBg($code);
        echo json_encode($bg);
    }
      
}