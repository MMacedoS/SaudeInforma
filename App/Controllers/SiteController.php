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

    public function vacinas($params = "vacinas") 
    {
        if (empty($params) || $params == 'vacinas') {
            $data = $this->vacinaModel->getAllVacina();
            $params = 'vacinas';
        }

        if (!empty($params) && is_numeric($params) ) {
            $data = $this->vacinaModel->getByIdVacina($params);
            $params = 'dados';
        }
        
        $this->prepareSite('index', $params, $data, 'Vacina');
    }

    public function consultas ($params = "consultas") 
    {
        if (empty($params) || $params == 'consultas') {
            $data = $this->consultaModel->getAllConsulta();
            $params = 'consultas';
        }

        if (!empty($params) && is_numeric($params) ) {
            $data = $this->consultaModel->getByIdConsulta($params);
            $params = 'dados';
        }
        
        $this->prepareSite('index', $params, $data, 'Consulta');
    }

    public function gestante ($params = "gestante") 
    {        
        if (empty($params) || $params == 'gestante') {
            $data = $this->gestanteModel->getAllGestante();
            $params = 'gestante';
        }

        if (!empty($params) && is_numeric($params) ) {
            $data = $this->gestanteModel->getByIdGestante($params);
            $params = 'dados';
        }
        
        $this->prepareSite('index', $params, $data, 'Gestante');
    }

    public function dentista ($params = "dentista") 
    {
        if (empty($params) || $params == 'dentista') {
            $data = $this->dentistaModel->getAllDentista();
            $params = 'dentista';
        }

        if (!empty($params) && is_numeric($params) ) {
            $data = $this->dentistaModel->getByIdDentista($params);
            $params = 'dados';
        }
        
        $this->prepareSite('index', $params, $data, 'Dentista');
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