<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title>Excluir Reserva</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row">
                    <h3><strong>Deletar Reserva</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Sala</label>
                        <div class="controls">
                            <input type="text" name="sala" placeholder="Sala" value="<?php echo htmlentities($dados->sala); ?>" disabled>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Data</label>
                        <div class="controls">
                            <input type="date" name="data" placeholder="dd/mm/aaaa" value="<?php echo htmlentities($dados->data); ?>" disabled>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Horário Inicial</label>

                        <div class="controls">
                            <input type="time" name="hora_inicial" placeholder="hh:mm" value="<?php echo htmlentities($dados->hora_inicial); ?>" disabled>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                        <a class="btn btn-default" href="index.php?op=manageReserva">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>