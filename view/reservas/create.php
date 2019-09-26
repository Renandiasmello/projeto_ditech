<?php require_once(V_SESSION); ?>
<!DOCTYPE HTML>
<html lang="pt-br>
    <head>
        <title>Nova Reserva</title>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="span 10 offset1">
                <div class="row"><br />
                    <h3><strong>Cadastro de Reservas</strong></h3>
                </div>

                <form class="form-horizontal" action="" method="post">
                    <div class="control-group">
                        <label class="control-label">Sala</label>
                        <div class="controls">
                            <input type="text" class="form-control input1" name="sala" placeholder="Sala" value="<?php echo htmlentities($sala); ?>" disabled>
                            <input type="hidden" name="id_sala" value="<?php echo htmlentities($id_sala); ?>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Data</label>
                        <div class="controls">
                            <input type="date" name="data" class="form-control input2" placeholder="dd/mm/aaaa" value="<?php echo htmlentities($data); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Horário Inicial</label>
                        <?php $hora_ini = $hora_inicial < 10 ? '0'.$hora_inicial.':00' : $hora_inicial.':00';?>
                        <div class="controls">
                            <input type="time" name="hora_inicial" class="form-control input2" placeholder="hh:mm" value="<?php echo htmlentities($hora_ini); ?>" required>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <input type="hidden" name="form-submitted" value="1">
                        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        <a class="btn btn-default" href="home.php?op=manageReserva">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>