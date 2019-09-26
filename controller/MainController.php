<?php

include_once 'SalaManipulaController.php';
include_once 'UsuarioManipulaController.php';
include_once 'ReservaManipulaController.php';

class MainController {

    private $mainManipulaController = null;
    private $salaManipulaController = null;
    private $usuarioManipulaController = null;
    private $reservaManipulaController = null;

    public function __construct() {
        $this->mainManipulaController    = null;
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
                case 'deletarReserva':
                    $this->deleteReserva();
                    break;
                case 'logoutSistema':
                    $this->logout();
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

        $id_sala = isset($_GET['sala']) ? trim($_GET['sala']) : null;
        $sala = '';
        if($id_sala){
            $dados_sala = $this->salaManipulaController->readManipula($id_sala);
            $sala = $dados_sala->descricao;
        }

        $id_usuario = isset($_GET['id_usuario']) ? trim($_GET['id_usuario']) : null;
        $hora_inicial = isset($_GET['hi']) ? trim($_GET['hi']) : null;
        $data = isset($_GET['data']) ? trim($_GET['data']) : null;

        if (isset($_POST['form-submitted'])) {

            $id_sala = isset($_POST['id_sala']) ? trim($_POST['id_sala']) : null;
            $id_usuario = isset($_POST['id_usuario']) ? trim($_POST['id_usuario']) : null;
            $hora_inicial = isset($_POST['hora_inicial']) ? trim($_POST['hora_inicial']) : null;
            $hora_final = ((substr($hora_inicial,0,2)+1) < 10 ? '0'.(substr($hora_inicial,0,2)+1) : (substr($hora_inicial,0,2)+1) )
                            . ':' .substr($hora_inicial,3,2);
            $data = isset($_POST['data']) ? trim($_POST['data']) : null;

            $dados = $this->reservaManipulaController->createManipula($id_sala, $id_usuario, $hora_inicial, $hora_final, $data);
            header('Location: home.php?op=manageReserva');

        }

        include_once 'view'. DS . 'reservas' . DS . 'create.php';
    }

    public function deleteReserva() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->reservaManipulaController->deleteManipula($id);
            header('Location: home.php?op=manageReserva');
        }

        $dados = $this->reservaManipulaController->readManipula($id);
        include_once 'view'. DS . 'reservas' . DS . 'delete.php';
    }

    public function createSala() {

        $descricao = '';

        if (isset($_POST['form-submitted'])) {

            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;

            $dados = $this->salaManipulaController->createManipula($descricao);
            header('Location: home.php?op=listarSalas');

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
            header('Location: home.php?op=listarSalas');
            return $dados;
        }

        include_once 'view' . DS . 'salas' . DS . 'update.php';
    }

    public function deleteSala() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->salaManipulaController->deleteManipula($id);
            header('Location: home.php?op=listarSalas');
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
            header('Location: home.php?op=listarUsuarios');

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
            header('Location: home.php?op=listarUsuarios');
            return $dados;
        }

        include_once 'view' . DS . 'usuarios' . DS . 'update.php';
    }

    public function deleteUsuario() {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_POST['form-submitted'])) {
            $dados = $this->usuarioManipulaController->deleteManipula($id);
            header('Location: home.php?op=listarUsuarios');
        }

        $dados = $this->usuarioManipulaController->readManipula($id);
        include_once 'view' . DS . 'usuarios' . DS . 'delete.php';
    }

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

    public function logout() {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['id_usuario']);
        unset($_SESSION['nome']);
        header('location:index.php');
    }

}
