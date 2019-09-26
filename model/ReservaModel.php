<?php

require_once 'model'.DS.'Conexao.php';

class ReservaModel {

    private $conn;

    public function __construct() {
        $conn = new Conexao();
        $this->conn = $conn->conectar();
    }
    /*
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
    */
        public function listaHorarios($id_sala, $data) {
            $sql = $this->conn->prepare("SELECT s.descricao as sala, u.nome as usuario, rs.*
                                                  FROM reservas_salas rs
                                                   INNER JOIN salas s ON s.id = rs.id_sala
                                                   INNER JOIN usuarios u ON u.id = rs.id_usuario
                                                  WHERE rs.id_sala = :id_sala
                                                    AND rs.data = :data
                                                  ORDER BY rs.hora_inicial");

            $sql->bindValue(':id_sala', $id_sala, PDO::PARAM_INT);
            $sql->bindValue(':data', $data, PDO::PARAM_STR);
            $sql->execute();

            $dados = array();
            while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
                $dados[] = $obj;
            }
            return $dados;

        }

}
