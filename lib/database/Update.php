<?php
//UPDATE Posts SET subject = 'Q1q1q1q1q1q1q1q', detail = 'AAAAAAAA' WHERE id = 60;

namespace mvc\lib\database;

use mvc\lib\database\common\Bridge;

class Update extends Bridge
{

    private $tableName;//таблица
    private $values;//данные для базы

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
        $sql = 'UPDATE ' . $this->getTableName() . ' SET ';//начало строки апдейт
        $str2 = '';
        foreach ($this->values as $k => $v) {
            $str2 .= $k . ' = \'' . $v . '\', ';
        }
        $str2 = mb_substr($str2, 0, mb_strlen($str2) - 2);//убить последнюю запятую и пробел
        $sql .= $str2 . ' WHERE ' . array_key_last($this->values) . ' = \'' . $this->values[array_key_last($this->values)] . '\'';
        return $sql;
    }

    public function execute()
    {
        $result = $this->fromDB();//подготовка и выполнение запроса (из бриджа)
        return $result;
    }

}