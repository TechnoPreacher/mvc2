<?php

namespace mvc\lib\database\common;

use mvc\lib\database\Select;

class SQL
{

    public function select()//для селетка
    {
        return new Select();
    }

//    public function insert() {  return new Select();}///для инсерта
//    public function update() {  return new Select();}///для апдейта
}