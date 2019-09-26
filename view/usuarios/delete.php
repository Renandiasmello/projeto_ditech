<?php require_once(V_SESSION); ?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title>Excluir Usuário</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row">
                    <h3><strong>Deletar Usuário</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="nome" placeholder="Nome" value="<?php echo htmlentities($dados->nome); ?>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Login</label>
                        <div class="controls">
                            <input type="text" name="login" placeholder="Login" value="<?php echo htmlentities($dados->login); ?>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                        <a class="btn btn-default" href="home.php?op=listarUsuarios">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>