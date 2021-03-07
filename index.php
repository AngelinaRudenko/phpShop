<?php

ini_set('display_errors', 1);//отображение ошибок
error_reporting(E_ALL);

//поделючение файлов сис-мы
define('ROOT', dirname((__FILE__)));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

//вызов Router
$router = new Router();
$router->run();