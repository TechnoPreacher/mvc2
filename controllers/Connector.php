<?php

namespace mvc\controllers;



class Connector
{
protected $connect;

public function __construct()
{
$config = include '../config/dbconfig.php';

    $connectionConfig = $config['driver']
        . ':host='.$config['host']
        . ':'.$config['port']
        . ';dbname='.$config['db_name'];
    $this->connect = new \PDO($connectionConfig, $config['user'],$config['pass']);
    //var_dump($connectionConfig);
    //var_dump($this->connect );
}

    public function getConnect(): \PDO
    {
        return $this->connect;
    }


}