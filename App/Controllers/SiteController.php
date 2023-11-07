<?php

require_once __DIR__ . "/../Model/VacinaModel.php";

class SiteController extends Controller{

    protected $vacinaModel;

    public function __construct() {
        $this->vacinaModel = new VacinaModel();
    }

    public function index ($params = "home") 
    {
        $this->prepareSite('index',$params);
    }

    public function vacinas ($params = "vacinas") 
    {
        $data = $this->vacinaModel->getAllVacina();
        $this->prepareSite('index',$params, $data);
    }

    public function consultas ($params = "consultas") 
    {
        $this->prepareSite('index',$params);
    }

    public function gestante ($params = "gestante") 
    {
        $this->prepareSite('index',$params);
    }

    public function dentista ($params = "dentista") 
    {
        $this->prepareSite('index',$params);
    }

    public function sobre ($params = "sobre") 
    {
        $this->prepareSite('index',$params);
    }

    public function contato ($params = "contato") 
    {
        $this->prepareSite('index',$params);
    }
}