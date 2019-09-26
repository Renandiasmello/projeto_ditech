<?php

require_once 'model'.DS.'Conexao.php';

class ReservaModel {

    private $conn;

    public function __construct() {
        $conn = new Conexao();
        $this->conn = $conn->conectar();
    }

    public function createModel($id_sala, $id_usuario, $hora_inicial, $hora_final, $data) {
        $sql = $this->conn->prepare('INSERT INTO reservas_salas (id_sala, id_usuario, hora_inicial, hora_final, data) VALUES (:id_sala, :id_usuario, :hora_inicial, :hora_final, :data);');
        $sql->bindValue(':id_sala', $id_sala, PDO::PARAM_INT);
        $sql->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $sql->bindValue(':hora_inicial', $hora_inicial, PDO::PARAM_STR);
        $sql->bindValue(':hora_final', $hora_final, PDO::PARAM_STR);
        $sql->bindValue(':data', $data, PDO::PARAM_STR);
        $sql->execute();
    }

        public function readModel($id) {
            $sql = $this->conn->prepare("SELECT s.descricao as sala, u.nome as usuario, rs.*
                                                  FROM reservas_salas rs
                                                   INNER JOIN salas s ON s.id = rs.id_sala
                                                   INNER JOIN usuarios u ON u.id = rs.id_usuario
                                                  WHERE rs.id = :id
                                                  ORDER BY rs.hora_inicial");
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();
            $dados = $sql->fetch(PDO::FETCH_OBJ);
            return $dados;
        }

        public function deleteModel($id) {
            $sql = $this->conn->prepare("DELETE FROM reservas_salas WHERE id=:id");
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        }
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
