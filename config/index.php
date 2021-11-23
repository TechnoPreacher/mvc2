<?php
//точка запуска роутера
require '../vendor/autoload.php';

use mvc\config\Router;

use mvc\controllers\Connector;

use mvc\lib\database\Select;//SELECT

use mvc\lib\database\Where;//WHERE

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




$obj = new Router();//запускаю роутер
$obj->run();

//коннект коннектора
//$connector = new Connector();
//$connectResource = $connector->getConnect();

////SELECT
//$select = new Select();
//$select->setTableNames('posts');
//$select->setFieldNames('subject, author_id');
//$select->setOrdered('author_id');
//$select->setOrderedType('desc');
//$select->setLimited(2);
//
//$sqlString = $select->getSqlString();
////echo $sqlString.'</br></br>';
//$exec = $connectResource->prepare($sqlString);
//$exec->execute();
//foreach ($exec as $dataRow) {
// //   var_dump($dataRow); echo '</br>';
//}
//echo '</br></br>';

//SELECT + WHERE

//$where=new Where();
//$where->setFields('author_id, subject');
//$where->setEquals('=,=');
//$where->setValues('1, first test');
//$where->setPredicate('OR');
//
////echo 'SQL with WHERE: '.$where->createWhereString($sqlString). '</br></br>';
//$exec = $connectResource->prepare($where->createWhereString($sqlString));
//$exec->execute();
//foreach ($exec as $dataRow) {
//  //  var_dump($dataRow); echo '</br>';
//}




//
////insert
//$exec=$connectResource->prepare("INSERT INTO posts( subject, detail,author_id) values ( 'first test','some text for first test',1 )");
//$exec->execute();
//
//$exec=$connectResource->prepare("INSERT INTO posts( subject, detail,author_id) values ( 'second test','some text for second test',2 )");
//$exec->execute();
//
//$exec=$connectResource->prepare("INSERT INTO posts( subject, detail,author_id) values ( 'third test','some text for third test',3 )");
//$exec->execute();
//
//$exec=$connectResource->prepare("INSERT INTO posts( subject, detail,author_id) values ( 'third test','some text for fourth test',4 )");
//$exec->execute();
//
////update
//$exec=$connectResource->prepare("UPDATE posts SET detail = 'UPDATED TEXT for ID=2' WHERE author_id=2");
//$exec->execute();
//
////delete
//$exec=$connectResource->prepare("DELETE FROM posts WHERE author_id=3");
//$exec->execute();
//
////select
//
//$exec = $connectResource->prepare('SELECT subject, created_at    FROM posts  WHERE author_id  = 1');
//$exec->execute();
//
//foreach ($exec as $dataRow) {
//        echo 'тема: '     . $dataRow['subject'] . '</br>';
//        echo  'создана: ' . $dataRow['created_at'] . '</br></br>';
//}
//
//
//$exec = $connectResource->prepare('SELECT *    FROM posts');
//$exec->execute();
//foreach ($exec as $dataRow) {
//    echo 'тема: '.$dataRow['subject'] . '</br>';
//   // echo  'создана: '. $dataRow['created_at'] . '</br></br>';
//}








