<?php

require_once 'Trait/GeneralTrait.php';

class ConsultaController extends Controller{
    protected $consultaModel;
    
    use GeneralTrait;

    public function __construct() 
    {
        $this->consultaModel = new ConsultaModel();
    }

    public function getAllConsulta() {
        $dados = $this->consultaModel->getAllConsulta();

        echo json_encode($dados);
    }

    public function findById($id) {
        $dados = $this->consultaModel->getByIdConsulta($id);

        echo json_encode($dados);
    }

    public function addConsulta(){
        $diretorio= __DIR__."../../../Public/Consulta";
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
        
        $create =  $this->consultaModel->create($cards);

        echo json_encode($create);
    }

    public function updConsulta($id){
        $diretorio= __DIR__."../../../Public/Consulta";
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
        
        $create =  $this->consultaModel->update($cards);

        echo json_encode($create);
    }

}