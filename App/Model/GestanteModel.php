<?php

class GestanteModel extends Conexao {
    protected $model;
    protected $conn;

    public function __construct() 
    {
        $this->conn = $this->montarConexao();
        $this->model = "gestante";
    }

    public function getAllGestante() {
        $stmt = $this
        ->conn
        ->prepare(
          "SELECT * FROM gestante"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdGestante($id) {
        $stmt = $this
        ->conn
        ->prepare(
          "SELECT * FROM gestante where id = $id"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($params) {
        if (empty($params)) {
            return false;
        }

       try {
            $stmt = $this->conn->prepare(
                "INSERT INTO gestante set identificacao = :identificacao,
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
                "UPDATE gestante set identificacao = :identificacao,
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