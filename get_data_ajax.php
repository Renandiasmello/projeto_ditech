<?php

define('DS', DIRECTORY_SEPARATOR);

require_once 'controller'.DS.'ReservaManipulaController.php';

$reservaManipulaController = new stdClass();
$reservaManipulaController = new ReservaManipulaController();

$id_sala = $_POST['id_sala'] ? $_POST['id_sala'] : null;
$hora_inicial = $_POST['hora_inicial'] ? $_POST['hora_inicial'] : null;
$data = $_POST['data_reserva'] ? $_POST['data_reserva'] : null;

$dados = $reservaManipulaController->verificaReservaManipula($id_sala, $hora_inicial, $data);

$return = !empty($dados) ? true : false;

echo json_encode(array('return' => $return));