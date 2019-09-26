<?php

require_once 'model'.DS.'ReservaModel.php';

class ReservaManipulaController extends ReservaModel {
    
    private $reservaModel = null;
    
    public function __construct() {
        $this->reservaModel = new ReservaModel();
    }
    /*
    public function createManipula($descricao) {
        $dados = $this->reservaModel->createModel($descricao);
        return $dados;
    }
    
    public function readManipula($id) {
        $dados = $this->reservaModel->readModel($id);
        return $dados;
    }

    public function updateManipula($id, $descricao) {
        $dados = $this->reservaModel->updateModel($id, $descricao);
        //return $dados;
    }

    public function deleteManipula($id) {
        $this->reservaModel->deleteModel($id);
    } */

    public function listaHorariosManipula($id_sala, $data) {
        $dados = $this->reservaModel->listaHorarios($id_sala, $data);
        return $dados;
    }
}
