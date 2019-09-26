<?php require_once(V_SESSION); ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
        <title>Sistema de Reserva de Salas</title>
    </head>
    <body>
        <div class="container">
            <div class="row"><br />
                <h2><strong><a href="home.php">Sistema de Reserva de Salas </a></strong></h2><br />
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
                                <a href="home.php?op=manageReserva" class="btn btn-success">Reservas</a>
                                <a class="btn btn-info" href="home.php?op=listarSalas">Salas</a>
                                <a class="btn btn-info" href="home.php?op=listarUsuarios">Usuários</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

