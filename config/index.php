<?php
//точка запуска роутера
require '../vendor/autoload.php';
use mvc\config\Router;


$obj = new Router();//запускаю роутер
$obj->run();


