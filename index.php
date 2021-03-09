<?php

ini_set('display_errors', 1);//отображение ошибок
error_reporting(E_ALL);

//начало сессии
session_start();

//поделючение файлов сис-мы
define('ROOT', dirname((__FILE__)));
require_once(ROOT.'/components/Autoload.php');

//вызов Router
$router = new Router();
$router->run();