<?php

require_once 'Trait/GeneralTrait.php';

class GestanteController extends Controller{
    protected $gestanteModel;
    
    use GeneralTrait;

    public function __construct() 
    {
        $this->gestanteModel = new GestanteModel();
    }

    public function getAllGestante() {
        $dados = $this->gestanteModel->getAllGestante();

        echo json_encode($dados);
    }

    public function findById($id) {
        $dados = $this->gestanteModel->getByIdGestante($id);

        echo json_encode($dados);
    }

    public function addGestante(){
        $diretorio= __DIR__."../../../Public/Gestante";
        $cards = self::uploadFileWithHash('imagem', $diretorio);
       
        if (is_null($cards)) {
            echo json_encode("Error uploading");
            return;
        }
        $cards['identificacao'] = $_POST['identificacao'];
        $cards['descricao'] = $_POST['descricao'];
        $cards['data_inicial'] = $_POST['data_inicial'];
        $cards['data_final'] = $_POST['data_final'];
        $cards['local'] = $_POST['local'];
        
        $create =  $this->gestanteModel->create($cards);

        echo json_encode($create);
    }

    public function updGestante($id){
        $diretorio= __DIR__."../../../Public/Gestante";
        $cards = self::uploadFileWithHash('imagem', $diretorio);
       
        if (is_null($cards)) {
            echo json_encode("Error uploading");
            return;
        }
        $cards['identificacao'] = $_POST['identificacao'];
        $cards['descricao'] = $_POST['descricao'];
        $cards['data_inicial'] = $_POST['data_inicial'];
        $cards['data_final'] = $_POST['data_final'];
        $cards['local'] = $_POST['local'];
        $cards['id'] = $_POST['id'];
        
        $create =  $this->gestanteModel->update($cards);

        echo json_encode($create);
    }

}