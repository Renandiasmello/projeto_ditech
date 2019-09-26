<?php


define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

define('V_SESSION', ROOT.DS.'projeto_ditech'.DS.'v_session.php');
require_once(V_SESSION);

//require_once 'v_session.php';
require_once 'controller'.DS.'MainController.php';

$controller = new MainController();

$controller->request();
