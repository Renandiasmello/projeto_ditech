<?php

//echo date('d-m-Y');exit;
//var_dump($dados);exit;
//var_dump($lista_horarios);exit;
//var_dump($id_sala);


//var_dump($lista_horarios);
/*
$array = array();
foreach ($lista_horarios as $lista){
//    var_dump($lista);
    $array[$lista->hora_inicial] = $lista;
}

foreach ($array as $key => $item){
    for($i=01; $i<=24; $i++){
echo $i . '<br>';
//        if($i != $key){
//
//        }
    }
}

var_dump($array);*/
//var_dump(isset($id_sala));
//exit;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<!--    <head>-->
<!--        <title> Reservar Sala</title>-->
<!--        <meta charset="utf-8">-->
<!--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!--    </head>-->
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
                <h1><strong><a href="index.php"> Reservar Salas </a></strong></h1><br />
            </div>
            <form class="form-horizontal" action="" method="post">
                <?php $id_sala = isset($id_sala) ? $id_sala : null;
                      $data = isset($data) ? $data : date('d-m-Y'); ?>
                <div class="control-group">
                    <fieldset>
                        <legend>Consulte a disponibilidade por Sala e Dia</legend>
                        <div class="controls">
                            <select id="sala" name="sala">
                                <option>Selecione uma sala</option>
                                <?php foreach ($dados as $key => $dado): ?>
                                <?php $selected = ($id_sala && $dado->id == $id_sala ) ? 'selected' : '' ;?>
                                    <?php echo "<option value=\"$dado->id\" $selected>$dado->descricao</option>"; ?>
                                <?php endforeach; ?>
                            </select>
                            <input type="date" id="data" name="data" placeholder="Data" value="<?php echo (isset($data) ? $data : date('d-m-Y')) ?>">
                            <button type="submit" class="btn btn-success buscar">Consultar</button>
                            <span class="help-inline"></span>
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
                                            <tr style="background-color: #FA8072; color: #FFFAFA">
                                                <td><?php echo $horario->hora_inicial; ?></td>
                                                <td><?php echo $horario->hora_final; ?></td>
                                                <td><?php echo $horario->usuario; ?></td>
                                                <td class="text-center">
                                                    <!--<a class="btn btn-primary" href="index.php?op=editarReserva&id=<?php //echo $dado->id; ?>">Atualizar</a>-->
                                                    <a class="btn btn-danger" href="index.php?op=deletarReserva&id=<?php echo $horario->id; ?>">Deletar</a>
                                                </td>

                                            </tr>
                                        <?php } else if($i != $hora_reservada_fim && $i != $diff && !in_array($i, $array_rejects)){ ?>
                                            <tr style="background-color: #00FA9A; ">
                                                <td> (<?php echo ($i < 10 ? '0'.$i.':00:00' : $i.':00:00') ?>)</td>
                                                <td colspan="2" class=""> Disponível para reserva</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="index.php?op=reservarSala&sala=<?php echo $id_sala; ?>&id_usuario=<?php echo 2;?>&hi=<?php echo $i;?>&data=<?php echo $data;?>">Reservar</a>
                                                </td>
                                            </tr>
                                        <?php $diff = $i;?>
                                        <?php } # fim else ?>
                                        <?php endforeach; ?>
                                    <?php } # fim for linhas horarios?>

                                <?php } else { # se nao houver nada reservado no dia ?>
                                    <?php for($i=0;$i<=23;$i++){ ?>
                                        <tr style="background-color: #00FA9A; ">
                                            <td> (<?php echo ($i < 10 ? '0'.$i.':00:00' : $i.':00:00') ?>)</td>
                                            <td colspan="2" class=""> Disponível para reserva</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="index.php?op=reservarSala&sala=<?php echo $id_sala; ?>&id_usuario=<?php echo 2;?>&hi=<?php echo $i;?>&data=<?php echo $data;?>">Reservar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } # fim else ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="4"><i>Sem registros a serem exibidos</i></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <br>
                <div class="form-actions">
                    <input type="hidden" name="form-submitted" value="1">
<!--                        <button type="submit" class="btn btn-success">Cadastrar</button>-->
                    <a class="btn btn-default" href="index.php">Voltar</a>
                </div>
            </form>
        </div>
    </body>
</html>