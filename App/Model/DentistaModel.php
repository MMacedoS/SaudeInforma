<?php

class DentistaModel extends Conexao {
    protected $model;
    protected $conn;

    public function __construct() 
    {
        $this->conn = $this->montarConexao();
        $this->model = "dentista";
    }

    public function getAllDentista() {
        $stmt = $this
        ->conn
        ->prepare(
          "SELECT * FROM dentista"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdDentista($id) {
        $stmt = $this
        ->conn
        ->prepare(
          "SELECT * FROM dentista where id = $id"
        );
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($params) {
        if (empty($params)) {
            return false;
        }

       try {
            $stmt = $this->conn->prepare(
                "INSERT INTO dentista set identificacao = :identificacao,
                data_inicial = :data_inicial, data_final = :data_final,
                descricao = :descricao, imagem = :imagem, local = :local"
            );
            $stmt->bindValue(':identificacao', $params['identificacao']);
            $stmt->bindValue(':data_inicial', $params['data_inicial']);
            $stmt->bindValue(':data_final', $params['data_final']);
            $stmt->bindValue(':descricao', $params['descricao']);
            $stmt->bindValue(':imagem', $params['imagem']);
            $stmt->bindValue(':local', $params['local']);            
            
            return $stmt->execute();

       } catch (\Throwable $th) {
            var_dump($th->getMessage());
            die;
            return $th->getMessage();
       }
    }

    public function update($params) {
        if (empty($params)) {
            return false;
        }

       try {
            $stmt = $this->conn->prepare(
                "UPDATE dentista set identificacao = :identificacao,
                data_inicial = :data_inicial, data_final = :data_final,
                descricao = :descricao, imagem = :imagem, local = :local 
                where id = :id"
            );
            $stmt->bindValue(':identificacao', $params['identificacao']);
            $stmt->bindValue(':data_inicial', $params['data_inicial']);
            $stmt->bindValue(':data_final', $params['data_final']);
            $stmt->bindValue(':descricao', $params['descricao']);
            $stmt->bindValue(':imagem', $params['imagem']);
            $stmt->bindValue(':local', $params['local']); 
            $stmt->bindValue(':id', $params['id']);            
            
            return $stmt->execute();

       } catch (\Throwable $th) {
            var_dump($th->getMessage());
            die;
            return $th->getMessage();
       }
    }
}