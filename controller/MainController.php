<?php

//include_once 'CrudManipulaController.php';
include_once 'SalaManipulaController.php';
include_once 'UsuarioManipulaController.php';
include_once 'ReservaManipulaController.php';

class MainController {

    private $mainManipulaController = null;
    private $salaManipulaController = null;
    private $usuarioManipulaController = null;
    private $reservaManipulaController = null;

    public function __construct() {
        $this->mainManipulaController    = null;//new CrudManipulaController();
        $this->salaManipulaController    = new SalaManipulaController();
        $this->usuarioManipulaController = new UsuarioManipulaController();
        $this->reservaManipulaController = new ReservaManipulaController();
    }

    public function request() {

        $op = isset($_GET['op']) ? $_GET['op'] : null;

        try {
            switch ($op) {
                case 'listar':
                    $this->read();
                    break;
                case 'listarSalas':
                    $this->readAllSalas();
                    break;
                case 'listarUsuarios':
                    $this->readAllUsuarios();
                    break;
                case 'novaSala':
                    $this->createSala();
                    break;
                case 'editarSala':
                    $this->updateSala();
                    break;
                case 'deletarSala':
                    $this->deleteSala();
                    break;
                case 'novoUsuario':
                    $this->createUsuario();
                    break;
                case 'editarUsuario':
                    $this->updateUsuario();
                    break;
                case 'deletarUsuario':
                    $this->deleteUsuario();
                    break;
                case 'manageReserva':
                    $this->manageReserva();
                    break;
                case 'reservarSala':
                    $this->createReserva();
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
                    $this->readIndex();
                    break;
            }
        } catch (Exception $e) {

            throw new Exception('Erro Main controller ' . $e->getMessage());
        }
    }

    public function manageReserva() {

        $lista_horarios = array();

        if (isset($_POST['form-submitted'])) {

            $id_sala = isset($_POST['sala']) ? trim($_POST['sala']) : null;
            $data = isset($_POST['data']) ? trim($_POST['data']) : null;

            $lista_horarios = $this->reservaManipulaController->listaHorariosManipula($id_sala, $data);

        }

        $dados = $this->salaManipulaController->readAllManipula();

        include_once 'view'. DS . 'reservas' . DS . 'manage.php';
    }

    public function createReserva() {

        $descricao = '';
var_dump($_GET);exit;
        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;

            $dados = $this->reservaManipulaController->createManipula($descricao);
            header('Location: index.php?op=listarSalas');

            return $dados;
        }

        include_once 'view'. DS . 'salas' . DS . 'create.php';
    }

    public function createSala() {

        $descricao = '';

        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;

            $dados = $this->salaManipulaController->createManipula($descricao);
            header('Location: index.php?op=listarSalas');

            return $dados;
        }

        include_once 'view'. DS . 'salas' . DS . 'create.php';
    }

    public function updateSala() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $descricao = '';
        $dados = $this->salaManipulaController->readManipula($id);

        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;

            $dados = $this->salaManipulaController->updateManipula($id, $descricao);
            header('Location: index.php?op=listarSalas');
            return $dados;
        }

        include_once 'view' . DS . 'salas' . DS . 'update.php';
    }

    public function deleteSala() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->salaManipulaController->deleteManipula($id);
            header('Location: index.php?op=listarSalas');
        }

        $dados = $this->salaManipulaController->readManipula($id);
        include_once 'view'. DS . 'salas' . DS . 'delete.php';
    }

    public function createUsuario() {

        $nome = '';
        $login = '';
        $senha = '';

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $login = isset($_POST['login']) ? trim($_POST['login']) : null;
            $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

            $dados = $this->usuarioManipulaController->createManipula($nome, $login, $senha);
            header('Location: index.php?op=listarUsuarios');

            return $dados;
        }

        include_once 'view' . DS . 'usuarios' . DS . 'create.php';
    }

    public function updateUsuario() {

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
            header('Location: index.php?op=listarUsuarios');
            return $dados;
        }

        include_once 'view' . DS . 'usuarios' . DS . 'update.php';
    }

    public function deleteUsuario() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->usuarioManipulaController->deleteManipula($id);
            header('Location: index.php?op=listarUsuarios');
        }

        $dados = $this->usuarioManipulaController->readManipula($id);
        include_once 'view' . DS . 'usuarios' . DS . 'delete.php';
    }
/*
    public function create() {

        $nome = '';
        $email = '';
        $telefone = '';

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : null;

            $dados = $this->crudManipulaController->createManipula($nome, $email, $telefone);
            header('Location: index.php');

            return $dados;
        }

        include_once 'view' . DS . 'create.php';
    }

    public function read() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $dados = $this->crudManipulaController->readManipula($id);
        include_once 'view' . DS . 'read.php';
    }

    public function update() {

        $nome = '';
        $email = '';
        $telefone = '';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $dados = $this->crudManipulaController->readManipula($id);

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : null;

            $dados = $this->crudManipulaController->updateManipula($id, $nome, $email, $telefone);
            header('Location: index.php');
            return $dados;
        }

        include_once 'view' . DS . 'update.php';
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->crudManipulaController->deleteManipula($id);
            header('Location: index.php');
        }

        $dados = $this->crudManipulaController->readManipula($id);
        include_once 'view' . DS . 'delete.php';
    }
*/
    public function readIndex() {
        //$dados = $this->crudManipulaController->readAllManipula();
        include_once 'view' . DS . 'index.php';
    }

    public function readAllSalas() {
        $dados = $this->salaManipulaController->readAllManipula();
        include_once 'view'. DS . 'salas' . DS . 'readAll.php';
    }

    public function readAllUsuarios() {
        $dados = $this->usuarioManipulaController->readAllManipula();
        include_once 'view'. DS . 'usuarios' . DS . 'readAll.php';
    }

}
