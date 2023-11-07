<?php

require_once __DIR__ . "/../Model/VacinaModel.php";
require_once __DIR__ . "/../Model/ConsultaModel.php";
require_once __DIR__ . "/../Model/GestanteModel.php";
require_once __DIR__ . "/../Model/DentistaModel.php";


class SiteController extends Controller{

    protected $vacinaModel;
    protected $consultaModel;
    protected $gestanteModel;
    protected $dentistaModel;


    public function __construct() {
        $this->vacinaModel = new VacinaModel();
        $this->consultaModel = new ConsultaModel();
        $this->gestanteModel = new GestanteModel();
        $this->dentistaModel = new DentistaModel();
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
        $data = $this->consultaModel->getAllConsulta();
        $this->prepareSite('index',$params, $data);
    }

    public function gestante ($params = "gestante") 
    {
        $data = $this->gestanteModel->getAllGestante();
        $this->prepareSite('index',$params, $data);
    }

    public function dentista ($params = "dentista") 
    {
        $data = $this->dentistaModel->getAllDentista();
        $this->prepareSite('index',$params, $data);
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