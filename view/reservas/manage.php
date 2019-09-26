<?php require_once(V_SESSION); ?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <script src="public/js/jquery-3.4.1.min.js"></script>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/js.js"></script>
        <title>Reservar Salas</title>
    </head>
    <body>
        <div class="container">
            <div class="row"><br />
                <h1><strong><a href="home.php"> Reservar Salas </a></strong></h1><br />
            </div>
            <form class="form-horizontal" action="" method="post">
                <?php $id_sala = isset($id_sala) ? $id_sala : null;
                      $data = isset($data) ? $data : date('d-m-Y'); ?>
                <div class="form-group">
                    <fieldset>
                        <label class="col-md-2 control-label" for="sala">Selecione uma sala <h11>*</h11></label>
                        <legend>Consulte a disponibilidade por Sala e Dia</legend>
                        <div class="col-md-3">
                            <select required id="sala" name="sala" class="form-control">
                                <option value="">Selecione</option>
                                <?php foreach ($dados as $key => $dado): ?>
                                    <?php $selected = ($id_sala && $dado->id == $id_sala ) ? 'selected' : '' ;?>
                                    <?php echo "<option value=\"$dado->id\" $selected>$dado->descricao</option>"; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="data">Data <h11>*</h11></label>
                        <div class="col-md-2">
                            <input id="data" name="data" placeholder="00/00/0000" value="<?php echo (isset($data) ? $data : date('d-m-Y')) ?>" class="form-control input-md" required="" type="date" maxlength="11">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary buscar">Consultar</button>
                        </div>
                    </fieldset>
                </div><br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Horário Inicial</th>
                        <th>Horário Final</th>
                        <th>Reservado por</th>
                        <th class="col-sm-3 text-center">Ações</th>
                    </tr>
                    </thead>

                    <tbody><?php
                    $exibe_horarios = true;
                    if(isset($_POST['form-submitted'])){
                        $hoje = date('Y-m-d');
                        if($data < $hoje){
                            echo "<tr>";
                                echo "<td colspan='4'>";
                                    echo "<div class=\"alert alert-danger\">Data não disponível para reservas.</div>";
                                echo "</td>";
                            echo "</tr>";
                            $exibe_horarios = false;
                        }
                    }
                    if($exibe_horarios){
                        $diff = null;
                        if(!empty($id_sala)){
                            if(!empty($lista_horarios)){
                                foreach ($lista_horarios as $rejects){
                                    $array_rejects[] = substr($rejects->hora_inicial,0,2);
                                }
                                for($i=0;$i<=23;$i++){
                                    foreach ($lista_horarios as $horario):
                                        $hora_reservada_ini = substr($horario->hora_inicial,0,2);
                                        $hora_reservada_fim = substr($horario->hora_final,0,2);
                                            if($i == $hora_reservada_ini){ $diff = $i; ?>
                                                <tr style="background-color: #FFE4C4; color: #2F4F4F">
                                                    <td><?php echo $horario->hora_inicial; ?></td>
                                                    <td><?php echo $horario->hora_final; ?></td>
                                                    <td><?php echo $horario->usuario; ?></td>
                                                    <td class="text-center">
                                                        <!--<a class="btn btn-primary" href="home.php?op=editarReserva&id=<?php //echo $horario->id; ?>">Atualizar</a>-->
                                                        <?php if($horario->id_usuario == $_SESSION['id_usuario']) { # Comparar com o da Sessão ?>
                                                            <a class="btn btn-danger" href="home.php?op=deletarReserva&id=<?php echo $horario->id; ?>">Deletar</a>
                                                        <?php } else { ?>
                                                            Reservado
                                                        <?php }?>
                                                    </td>

                                                </tr>
                                            <?php } else if($i != $hora_reservada_fim && $i != $diff && !in_array($i, $array_rejects)){ ?>
                                                <tr style="background-color: #FFFFF0; color: #2F4F4F; ">
                                                    <td> (<?php echo ($i < 10 ? '0'.$i.':00:00' : $i.':00:00') ?>)</td>
                                                    <td colspan="2" class=""> Disponível para reserva</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-success" href="home.php?op=reservarSala&sala=<?php echo $id_sala; ?>&id_usuario=<?php echo 2;?>&hi=<?php echo $i;?>&data=<?php echo $data;?>">Reservar</a>
                                                    </td>
                                                </tr>
                                            <?php $diff = $i;?>
                                            <?php } # fim else ?>
                                            <?php endforeach; ?>
                                        <?php } # fim for linhas horarios?>

                                    <?php } else { # se nao houver nada reservado no dia ?>
                                        <?php for($i=0;$i<=23;$i++){ ?>
                                            <tr style="background-color: #FFFFF0; color: #2F4F4F; ">
                                                <td> (<?php echo ($i < 10 ? '0'.$i.':00:00' : $i.':00:00') ?>)</td>
                                                <td colspan="2" class=""> Disponível para reserva</td>
                                                <td class="text-center">
                                                    <a class="btn btn-success" href="home.php?op=reservarSala&sala=<?php echo $id_sala; ?>&id_usuario=<?php echo 2;?>&hi=<?php echo $i;?>&data=<?php echo $data;?>">Reservar</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } # fim else ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4"><i>Sem registros a serem exibidos</i></td>
                                </tr>
                            <?php } # else id_sala ?>
                        <?php } # Fim exibe horários ?>

                    </tbody>
                </table>
                <br>
                <div class="form-actions">
                    <input type="hidden" name="form-submitted" value="1">
                    <a class="btn btn-default" href="home.php">Voltar</a>
                </div>
            </form>
        </div>
    </body>
</html>