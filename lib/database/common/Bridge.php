<?php

namespace mvc\lib\database\common;

use mvc\controllers\Connector;

abstract class Bridge
{
    protected $conn;

    public function __construct()
    {
        $obj=new Connector();
        $this->conn=$obj->getConnect();
    }

    public function fromDB()//запрос в БД
    {
        $exec = $this->conn->prepare($this->getSqlString());
         $exec->execute();
        return $exec;
    }

    public abstract function getSqlString();//будет переопределяться в классах - наследниках!

}