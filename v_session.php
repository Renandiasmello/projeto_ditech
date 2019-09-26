<?php

session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['id_usuario']);
    unset($_SESSION['nome']);
    header('location:index.php');
}
$logado = $_SESSION['login'];
$nome_sessao = $_SESSION['nome'];

?>
<style type="text/css">
    .input1 {
        width: 385px!important;
    }
    .input2 {
        width: 150px!important;
    }
</style>
<br>
<div class="container">
    <div class="text-right">
        <?php echo "Olá <b> {$nome_sessao} </b>";?><a href="home.php?op=logoutSistema">Sair</a>
    </div>
</div>
