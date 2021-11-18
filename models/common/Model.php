<?php

namespace mvc\models\common;

use mvc\lib\database\common\SQL;

class Model
{
    protected $sql;

    public function __construct()
    {
        $this->sql = new SQL();
    }

    protected function select()
    {
        return $this->sql->select();//обращение к классу select
    }
}