<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

require_once 'controller'.DS.'MainController.php';

$controller = new MainController();

$controller->request();
