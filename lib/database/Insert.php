<?php
//создаёт запросы типа:
//INSERT INTO posts(author_id, subject,detail) VALUES(333, '__','');

namespace mvc\lib\database;

use mvc\lib\database\common\Bridge;

class Insert extends Bridge
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
        $sql = 'INSERT INTO ' . $this->getTableName() . ' (';//начало строки инсерт
        $strNames = '';
        $strValues = '';
        foreach (array_keys($this->values) as $fieldName) {
            $strNames .= $fieldName . ', ';
        }
        $strNames = mb_substr($strNames, 0, mb_strlen($strNames) - 2);//убить последнюю запятую и пробел
        foreach (array_values($this->values) as $fieldValue) {
            $strValues .= '\'' . $fieldValue . '\'' . ', ';
        }
        $strValues = mb_substr($strValues, 0, mb_strlen($strValues) - 2);//убить последнюю запятую и пробел
        $sql .= $strNames . ') VALUES (' . $strValues . ')';

        return $sql;
    }

    public function execute()
    {
        $result = $this->fromDB();//подготовка и выполнение запроса (из бриджа)
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


}