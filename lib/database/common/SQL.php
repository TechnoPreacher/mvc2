<?php

namespace mvc\lib\database\common;

use mvc\lib\database\Insert;
use mvc\lib\database\Select;
use mvc\lib\database\Update;
use mvc\lib\database\Delete;


class SQL//фасад для вызова соответствующих классов
{
    public function select()//для селетка - вызывается в ОБЩЕЙ модели
    {
        return new Select();//просто создаётся класс селекта
    }

    public function insert()
    {
        return new Insert();//просто создаётся класс инсёрта
    }

    public function update()
    {
        return new Update();//просто создаётся класс апдейта
    }

    public function delete()
    {
        return new Delete();//просто создаётся класс апдейта
    }

}