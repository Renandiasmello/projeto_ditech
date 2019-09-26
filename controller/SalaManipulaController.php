<?php

require_once 'model'.DS.'SalaModel.php';

class SalaManipulaController extends SalaModel {
    
    private $salaModel = null;
    
    public function __construct() {
        $this->salaModel = new SalaModel();
    }
    
    public function createManipula($descricao) {
        $dados = $this->salaModel->createModel($descricao);
        return $dados;
    }
    
    public function readManipula($id) {
        $dados = $this->salaModel->readModel($id);
        return $dados;
    }

    public function updateManipula($id, $descricao) {
        $dados = $this->salaModel->updateModel($id, $descricao);
        //return $dados;
    }

    public function deleteManipula($id) {
        $this->salaModel->deleteModel($id);
    }

    public function readAllManipula() {
        $dados = $this->salaModel->readAllModel();
        return $dados;
    }
}
