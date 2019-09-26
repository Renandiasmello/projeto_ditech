<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Cadastro de Usuário </title>
    </head>
    <body>
        <div class="container">
            <div class="row"><br />
                <h1><strong><a href="index.php"> Usuários </a></strong></h1><br />
            </div>

            <div class="row">
                <p>
                    <a class="btn btn-default" href="index.php">Voltar</a>
                    <a href="index.php?op=novoUsuario" class="btn btn-success">Novo</a>
                </p>	
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th class="col-sm-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php foreach ($dados as $dado) : ?>						
                            <tr>
                                <td><?php echo htmlentities($dado->nome); ?></td>
                                <td><?php echo htmlentities($dado->login); ?></td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="index.php?op=editarUsuario&id=<?php echo $dado->id; ?>">Atualizar</a>
                                    <a class="btn btn-danger" href="index.php?op=deletarUsuario&id=<?php echo $dado->id; ?>">Deletar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

