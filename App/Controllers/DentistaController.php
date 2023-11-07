<?php

require_once 'Trait/GeneralTrait.php';

class DentistaController extends Controller{
    protected $dentistaModel;
    
    use GeneralTrait;

    public function __construct() 
    {
        $this->dentistaModel = new DentistaModel();
    }

    public function getAllDentista() {
        $dados = $this->dentistaModel->getAllDentista();

        echo json_encode($dados);
    }

    public function findById($id) {
        $dados = $this->dentistaModel->getByIdDentista($id);

        echo json_encode($dados);
    }

    public function addDentista(){
        $diretorio= __DIR__."../../../Public/Dentista";
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
        
        $create =  $this->dentistaModel->create($cards);

        echo json_encode($create);
    }

    public function updDentista($id){
        $diretorio= __DIR__."../../../Public/Dentista";

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
        
        $create =  $this->dentistaModel->update($cards);

        echo json_encode($create);
    }

}