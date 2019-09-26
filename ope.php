<?php
define('DS', DIRECTORY_SEPARATOR);

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

require_once 'model'.DS.'Conexao.php';
require_once 'controller'.DS.'UsuarioManipulaController.php';

$conn = new stdClass();
$usuarioManipulaController = new stdClass();
$conn = new Conexao();
$conn = $conn->conectar();
$usuarioManipulaController = new UsuarioManipulaController();

$dados = $usuarioManipulaController->validaLogin($login, md5($senha));

if($dados){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['id_usuario'] = $dados->id;
    $_SESSION['nome'] = $dados->nome;
    header('location:home.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}