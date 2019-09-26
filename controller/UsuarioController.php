<?php

include_once 'UsuarioManipulaController.php';

class UsuarioController {

    private $usuarioManipulaController = null;

    public function __construct() {
        $this->usuarioManipulaController = new UsuarioManipulaController();
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

            throw new Exception('Erro Usuario controller ' . $e->getMessage());
        }
    }

    public function create() {

        $nome = '';
        $login = '';
        $senha = '';

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $login = isset($_POST['login']) ? trim($_POST['login']) : null;
            $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

            $dados = $this->usuarioManipulaController->createManipula($nome, $login, $senha);
            header('Location: index.php');

            return $dados;
        }

        include_once 'view' . DS . 'create.php';
    }

    public function read() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $dados = $this->usuarioManipulaController->readManipula($id);
        include_once 'view' . DS . 'read.php';
    }

    public function update() {

        $nome = '';
        $login = '';
        $senha = '';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $dados = $this->usuarioManipulaController->readManipula($id);

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $login = isset($_POST['login']) ? trim($_POST['login']) : null;
            $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

            $dados = $this->usuarioManipulaController->updateManipula($id, $nome, $login, $senha);
            header('Location: index.php');
            return $dados;
        }

        include_once 'view' . DS . 'update.php';
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->usuarioManipulaController->deleteManipula($id);
            header('Location: index.php');
        }

        $dados = $this->usuarioManipulaController->readManipula($id);
        include_once 'view' . DS . 'delete.php';
    }

    public function readAll() {
        $dados = $this->usuarioManipulaController->readAllManipula();
        include_once 'view' . DS . 'readAll.php';
    }

}
