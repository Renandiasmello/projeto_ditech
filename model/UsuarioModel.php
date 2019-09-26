<?php

require_once 'model'.DS.'Conexao.php';

class UsuarioModel {

    private $conn;

    public function __construct() {
        $conn = new Conexao();
        $this->conn = $conn->conectar();
    }

    public function createModel($nome, $login, $senha) {
        $sql = $this->conn->prepare('INSERT INTO usuarios (nome, login, senha) VALUES (:nome, :login, :senha);');
        $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
        $sql->bindValue(':login', $login, PDO::PARAM_STR);
        $sql->bindValue(':senha', $senha, PDO::PARAM_STR);
        $sql->execute();
    }

    public function readModel($id) {
        $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $dados = $sql->fetch(PDO::FETCH_OBJ);
        return $dados;
    }

    public function validaLoginModel($login, $senha) {
        $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE login=:login AND senha=:senha");
        $sql->bindValue(':login', $login, PDO::PARAM_STR);
        $sql->bindValue(':senha', $senha, PDO::PARAM_STR);
        $sql->execute();
        $dados = $sql->fetch(PDO::FETCH_OBJ);
        return $dados;
    }

    public function updateModel($id, $nome, $login, $senha) {

        $sql = $this->conn->prepare("UPDATE usuarios SET nome=:nome, login=:login, senha=:senha WHERE id=:id LIMIT 1");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
        $sql->bindValue(':login', $login, PDO::PARAM_STR);
        $sql->bindValue(':senha', $senha, PDO::PARAM_STR);
        $sql->execute();
        
    }

    public function deleteModel($id) {
        $sql = $this->conn->prepare("DELETE FROM usuarios WHERE id=:id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
    }

    public function readAllModel() {
        $sql = $this->conn->prepare("SELECT * FROM usuarios");
        $sql->execute();

        $dados = array();
        while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
            $dados[] = $obj;
        }
        return $dados;

    }

}
