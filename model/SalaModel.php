<?php

require_once 'model' . DS . 'Conexao.php';

class SalaModel
{
    private $conn;

    public function __construct()
    {
        $conn = new Conexao();
        $this->conn = $conn->conectar();
    }

    public function createModel($descricao)
    {
        $sql = $this->conn->prepare('INSERT INTO salas (descricao) VALUES (:descricao);');
        $sql->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $sql->execute();
    }

    public function readModel($id)
    {
        $sql = $this->conn->prepare("SELECT * FROM salas WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $dados = $sql->fetch(PDO::FETCH_OBJ);

        return $dados;
    }

    public function updateModel($id, $descricao)
    {

        $sql = $this->conn->prepare("UPDATE salas SET descricao=:descricao WHERE id=:id LIMIT 1");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $sql->execute();

    }

    public function deleteModel($id)
    {
        $sql = $this->conn->prepare("DELETE FROM salas WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
    }

    public function readAllModel()
    {
        $sql = $this->conn->prepare("SELECT * FROM salas");
        $sql->execute();

        $dados = [];

        while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
            $dados[] = $obj;
        }

        return $dados;
    }
}
