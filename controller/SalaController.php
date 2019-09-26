<?php

include_once 'SalaManipulaController.php';

class SalaController {

    private $salaManipulaController = null;

    public function __construct() {
        $this->salaManipulaController = new SalaManipulaController();
    }

    public function request() {

        $op = isset($_GET['op']) ? $_GET['op'] : null;

        try {

            switch ($op) {
                case 'listar':
                    $this->read();
                    break;
                case 'novo':
                    $this->create();
                    break;
                case 'editar':
                    $this->update();
                    break;
                case 'deletar':
                    $this->delete();
                    break;
                default:
                    $this->readAll();
                    break;
            }
        } catch (Exception $e) {

            throw new Exception('Erro Sala controller' . $e->getMessage());
        }
    }

    public function create() {

        $descricao = '';

        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;
            
            $dados = $this->salaManipulaController->createManipula($descricao);
            header('Location: index.php');

            return $dados;
        }

        include_once 'view' . DS . 'create.php';
    }

    public function read() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $dados = $this->salaManipulaController->readManipula($id);
        include_once 'view' . DS . 'read.php';
    }

    public function update() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $descricao = '';
        $dados = $this->salaManipulaController->readManipula($id);

        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;

            $dados = $this->salaManipulaController->updateManipula($id, $descricao);
            header('Location: index.php');
            return $dados;
        }

        include_once 'view' . DS . 'update.php';
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->salaManipulaController->deleteManipula($id);
            header('Location: index.php');
        }

        $dados = $this->salaManipulaController->readManipula($id);
        include_once 'view' . DS . 'delete.php';
    }

    public function readAll() {
        $dados = $this->salaManipulaController->readAllManipula();
        include_once 'view'. DS. 'salas' . DS . 'readAll.php';
    }

}
