<?php require_once(V_SESSION); ?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title>Atualizar Dados</title>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row"><br />
                    <h3><strong>Atualizar Dados</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input type="text" name="nome" class="form-control input1" placeholder="Nome" value="<?php echo htmlentities($dados->nome); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Login</label>
                        <div class="controls">
                            <input type="text" name="login" class="form-control input1" placeholder="Login" value="<?php echo htmlentities($dados->login); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input type="password" name="senha" class="form-control input1" placeholder="senha" value="<?php echo htmlentities($dados->senha); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                        <a class="btn btn-default" href="home.php?op=listarUsuarios">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>