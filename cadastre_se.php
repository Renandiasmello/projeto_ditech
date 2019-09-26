<?php

if (isset($_POST['form-submitted'])) {
    define('DS', DIRECTORY_SEPARATOR);
    require_once 'model'.DS.'Conexao.php';
    require_once 'controller'.DS.'UsuarioManipulaController.php';

    $conn = new stdClass();
    $usuarioManipulaController = new stdClass();
    $conn = new Conexao();
    $conn = $conn->conectar();
    $usuarioManipulaController = new UsuarioManipulaController();

    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
    $login = isset($_POST['login']) ? trim($_POST['login']) : null;
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

    $dados = $usuarioManipulaController->createManipula($nome, $login, $senha);
    header('Location: index.php');

}

?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title> Novo Usuário</title>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
        .input1 {
            width: 385px!important;
        }
    </style>
    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row"><br />
                    <h3><strong>Cadastro de Usuário</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input type="text" name="nome" class="form-control input1" placeholder="Nome" value="" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Login</label>
                        <div class="controls">
                            <input type="text" name="login" class="form-control input1" placeholder="Login" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input type="password" name="senha" class="form-control input1" placeholder="Senha" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        <a class="btn btn-default" href="index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>