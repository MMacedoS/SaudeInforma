<?php

require_once 'Trait/GeneralTrait.php';

class VacinaController extends Controller{
    protected $app_model;
    
    use GeneralTrait;

    public function __construct() 
    {

    }

    public function addVacina(){
        $diretorio= __DIR__."../../Public/Vacina";
        $cards = self::uploadFileWithHash('imagem', $diretorio);
       
        if (is_null($cards)) {
            echo json_encode("Error uploading");
            return;
        }
        $cards['nome'] = $_POST['nome'];
        $cards['descricao'] = $_POST['descricao'];
        $cards['valor_atual'] = $_POST['data_inicio'];
        $cards['valor_anterior'] = $_POST['data_final'];
        
        $create =  $this->app_model->createCardApt($cards);

        echo json_encode($create);
    }

    public function updVacina($id){

    }

}