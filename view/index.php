<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Sistema de Reserva de Salas</title>
    </head>
    <body>
        <div class="container">
            <div class="row"><br />
                <h2><strong><a href="index.php">Sistema de Reserva de Salas </a></strong></h2><br />
            </div>

            <div class="row">
                <p>

                </p>	
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>O que deseja Gerenciar?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="index.php?op=manageReserva" class="btn btn-success">Reservas</a>
                                <a class="btn btn-info" href="index.php?op=listarSalas<?php //echo $dado->id; ?>">Salas</a>
                                <a class="btn btn-info" href="index.php?op=listarUsuarios<?php //echo $dado->id; ?>">Usuários</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

