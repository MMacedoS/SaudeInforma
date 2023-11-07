<?php

require_once 'Trait/GeneralTrait.php';

class VacinaController extends Controller{
    protected $vacinaModel;
    
    use GeneralTrait;

    public function __construct() 
    {
        $this->vacinaModel = new VacinaModel();
    }

    public function getAllVacina() {
        $dados = $this->vacinaModel->getAllVacina();

        echo json_encode($dados);
    }

    public function findById($id) {
        $dados = $this->vacinaModel->getByIdVacina($id);

        echo json_encode($dados);
    }

    public function addVacina(){
        $diretorio= __DIR__."../../../Public/Vacina";
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
        
        $create =  $this->vacinaModel->create($cards);

        echo json_encode($create);
    }

    public function updVacina($id){
        $diretorio= __DIR__."../../../Public/Vacina";
        $cards = self::uploadFileWithHash('imagem', $diretorio);
       
        if (!empty($_FILES['imagem'])) {
            $cards = self::uploadFileWithHash('imagem', $diretorio);
        
            if (is_null($cards)) {
                $cards['imagem'] = $_POST['imagem_anterior'];
            }
        } 
        $cards['identificacao'] = $_POST['identificacao'];
        $cards['descricao'] = $_POST['descricao'];
        $cards['data_inicial'] = $_POST['data_inicial'];
        $cards['data_final'] = $_POST['data_final'];
        $cards['local'] = $_POST['local'];
        $cards['id'] = $_POST['id'];
        
        $create =  $this->vacinaModel->update($cards);

        echo json_encode($create);
    }

}