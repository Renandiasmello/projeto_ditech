<?php

require_once 'model'.DS.'UsuarioModel.php';

class UsuarioManipulaController extends UsuarioModel {
    
    private $usuarioModel = null;
    
    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }
    
    public function createManipula($nome, $login, $senha) {
        $dados = $this->usuarioModel->createModel($nome, $login, $senha);
        return $dados;
    }
    
    public function readManipula($id) {
        $dados = $this->usuarioModel->readModel($id);
        return $dados;
    }

    public function updateManipula($id, $nome, $login, $senha) {
        $dados = $this->usuarioModel->updateModel($id, $nome, $login, $senha);
    }

    public function deleteManipula($id) {
        $this->usuarioModel->deleteModel($id);
    }

    public function readAllManipula() {
        $dados = $this->usuarioModel->readAllModel();
        return $dados;
    }

    public function validaLogin($login, $senha) {
        $dados = $this->usuarioModel->validaLoginModel($login, $senha);
        return $dados;
    }
}
