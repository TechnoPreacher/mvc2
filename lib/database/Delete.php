<?php

namespace mvc\lib\database;
use mvc\lib\database\common\Bridge;

class Delete extends Bridge
{
    private $tableName;//таблица
    private $values;//данные для условия удаления

    public function getValues()
    {
        return $this->values;
    }

    public function setValues($values): void
    {
        $this->values = $values;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setTableName($tableName): void
    {
        $this->tableName = $tableName;
    }

    public function getSqlString(): string//строит SQL
    {
        $sql = 'DELETE FROM ' . $this->getTableName();
        $whereObj = new Where();
        $whereObj->setConditions([array_key_last($this->values)=>$this->values[array_key_last($this->values)]]);
        $sql = $whereObj->createWhereString( $sql);
       // $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE ' . array_key_last($this->values) . ' = \'' . $this->values[array_key_last($this->values)] . '\'';
        return $sql;
    }

    public function execute()
    {
        $result = $this->fromDB();//подготовка и выполнение запроса (из бриджа)

        return $result;
    }

}