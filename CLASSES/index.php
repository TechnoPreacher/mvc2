<?php
require '../vendor/autoload.php';

use mvc\CLASSES\House;
use mvc\CLASSES\Cat;
use mvc\CLASSES\Dog;
use mvc\CLASSES\Cow;

$house1 = new House();
$house1->setHomeNumber(11);
$house1->setStageNumber(1);
$house1->setFlatNumber(2);

$house2 = new House();
$house2->setHomeNumber(22);
$house2->setStageNumber(2);
$house2->setFlatNumber(4);

echo $house1->getFlats().'</br>';
echo $house2->getFlats().'</br>';


$dog = new Dog();
$cat = new Cat();

$dog->say('master');
echo '</br>';
$cat->say('get lost');




