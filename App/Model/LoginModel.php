<?php

class LoginModel extends Conexao{

    protected $model;
    protected $conn;

    public function __construct() 
    {
        $this->conn = $this->montarConexao();
        $this->model = "usuarios";
    }

    public function logar($params)
    {
        if (is_null($params) && empty($params)) {
            return null;
        }
        
       $stmt = $this
        ->conn
        ->prepare(
          "SELECT 
            nome, 
            id, 
            acesso,
            status,
            email 
           FROM 
            $this->model 
           WHERE 
            email=:email 
           AND
            senha=:senha
           AND 
            status=:status
           LIMIT 1"
        );
        $stmt->bindValue(':email', $params->email );
        $stmt->bindValue(':senha', $params->senha );
        $stmt->bindValue(':status', 1 );
        $stmt->execute();
       $dados = $stmt->fetch(PDO::FETCH_ASSOC);
       
       if (
        !is_null($dados) && 
        !empty($dados)
        ){
            return $dados;
        }

        return null;
    }
}