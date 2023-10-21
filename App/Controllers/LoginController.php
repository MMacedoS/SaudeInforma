<?php

require_once __DIR__ . "/../Model/LoginModel.php";

class LoginController extends Controller{

    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        require_once __DIR__ . "/../../Public/View/Login/index.php";
    }

    public function auth()
    {
        $params = $this->validate($_POST);

        $res = $this->loginModel->logar($params);

        if(is_null($res)) {
            return header('Location: index/');
        }

        $sections = $this->loadSections($res);

       if($sections) {
            echo json_encode("acesso permitido");       
            return;
       }
        
    }
    
    private function validate(array $params) {
        if (!isset($_POST['email'])) {
            return header('Location: index/');
        }

        if (!isset($_POST['senha'])) {
            return header('Location: index/');
        }

        return (object)$params;
    }

} 