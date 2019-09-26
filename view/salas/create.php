<?php require_once(V_SESSION); ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> Nova Sala</title>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row"><br />
                    <h3><strong>Cadastro de Salas</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <input type="text" name="descricao" class="form-control input1" placeholder="Descrição" value="<?php echo htmlentities($descricao); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        <a class="btn btn-default" href="home.php?op=listarSalas">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>