<?php
//точка запуска роутера
require '../vendor/autoload.php';

use mvc\config\Router;


$obj = new Router();//запускаю роутер
$obj->run();


//use mvc\controllers\Connector;

//use mvc\lib\database\Select;//SELECT

//use mvc\lib\database\Where;//WHERE

//use mvc\CLASSES\House;
//
//$house1 = new House();
//$house1->setHomeNumber(11);
//$house1->setStageNumber(1);
//$house1->setFlatNumber(2);
//
//$house2 = new House();
//$house2->setHomeNumber(22);
//$house2->setStageNumber(2);
//$house2->setFlatNumber(4);
//
//echo $house1->getFlats();

