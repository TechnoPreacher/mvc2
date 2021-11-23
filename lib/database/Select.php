<?php

namespace mvc\lib\database;


//use http\Exception;

use mvc\lib\database\common\Bridge;

use mvc\lib\database\Where;

class Select extends Bridge
{
    private $tableNames;//таблицы-алиасы
    private $fieldNames = '*';//поля (по умолчанию - всё)
    private $ordered;//сортировка для ORDER BY
    private $orderedType;
    private int $limited = 0;//ограничение числа записей в выборке
    private int $offset = 0;//смещение
    private $whereCondition;


    public function setWhereCondition($whereCondition): void
    {
        $this->whereCondition = $whereCondition;
    }

    private function buildOutputString($stringToBuild, $order = false): string
    {
        $outputString = '';
        if (is_string($stringToBuild)) {
            $outputString = $stringToBuild;
        } elseif (is_array($stringToBuild)) {
            foreach ($stringToBuild as $key => $value) {
                if (!empty($outputString)) {
                    $outputString .= ',';
                }
                if (is_int($key)) {
                    $outputString .= $value;
                } else {
                    if (!$order) {
                        $outputString .= $value . ' AS ' . $key;
                    } else {
                        $outputString .= $key . ' ' . $value;
                    }
                }
            }
        }
        return $outputString;
    }

    private function getOrderedType()
    {
        return $this->orderedType;
    }

    private function getTableNames()
    {
        return $this->buildOutputString($this->tableNames);
    }

    private function getFieldNames()
    {
        return $this->buildOutputString($this->fieldNames);
    }

    private function getLimited()
    {
        return $this->limited;
    }

    private function getOffset()
    {
        return $this->offset;
    }

    private function getOrdered()
    {
        return $this->buildOutputString($this->ordered, true);
    }

    public function setFieldNames($fieldNames): void
    {
        $this->fieldNames = $fieldNames;
    }

    public function setLimited(int $limited): void
    {
        $this->limited = $limited;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    public function setOrdered(string $ordered): void
    {
        $this->ordered = $ordered;
    }

    public function setTableNames($tableNames): void
    {
        $this->tableNames = $tableNames;
    }

    public function setOrderedType(string $orderedType): void
    {
        $variants = ["ASC", "DESC"];
        $orderedType = strtoupper($orderedType);//cтроку в верхний регистр!
        foreach ($variants as $value) {
            if (strrpos((string)$orderedType, (string)$value) !== false) {
                $this->orderedType = ' ' . $value;
                return;
            }
        }
        $this->orderedType = '';
    }

    public function getSqlString(): string
    {
        $sql = 'SELECT ' . $this->getFieldNames() . ' FROM ' . $this->getTableNames();
        $whereStr = '';
        if (!empty($this->whereCondition)) {
            $obj = new Where();
            $obj->setConditions($this->whereCondition);
            $whereStr = $obj->createWhereString();
        }
        $sql = $sql . $whereStr;  //+where
        if (!empty($this->ordered)) {
            $sql .= ' ORDER BY ' . $this->getOrdered() . $this->getOrderedType();
        }
        if ($this->limited > 0) {
            $sql .= ' LIMIT ' . $this->getLimited();
            if ($this->offset > 0) {
                $sql .= ', ' . $this->getOffset();
            }
        }

        return $sql;
    }

    public function execute()
    {
        $result = $this->fromDB();
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

}