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
        return $this->sql->select();//обращение к классу select через фасад
    }

    protected function insert()
    {
        return $this->sql->insert();//обращение к классу insert через фасад
    }
    protected function update()
    {
        return $this->sql->update();//обращение к классу insert через фасад
    }
    protected function delete()
    {
        return $this->sql->delete();//обращение к классу delete через фасад
    }
}