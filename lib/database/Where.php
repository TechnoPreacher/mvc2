<?php
//создаёт простую строку типа WHERE $field1 $equal1 $Value1 $predicate1 $field2 $equal2 $Value2
//WHERE id>=2 AND id<=4
//WHERE age=23 AND salary=400
//WHERE id>=2 AND id<=4
//WHERE id=3 OR salary=400


namespace mvc\lib\database;


class Where
{
    private $fields;//поля для  отбора в виде массива
    private $equals;//операторы сравнения в виде массива
    private $values;//значения для отбора =, >, <, <=, в виде массива
    private $predicate;//предикаты типа AND, O
    private $selectString = '';//если уже сформирована строка SELECT чтоб вставить WHERE до  GROUP BY

    private function exploder($inputParam): array//помогает перекинуть строку в масисв
    {
        $outParam = [];
        if (is_string($inputParam)) {
            $outParam = explode(',', $inputParam);
        } else
            if (is_array($inputParam)) {
                $outParam = $inputParam;
            };
        return $outParam;
    }


    private function getPredicate()
    {
        return $this->predicate;
    }

    private function getEquals()
    {
        return $this->equals;
    }

    private function getFields()
    {
        return $this->fields;
    }

    private function getSelectString(): string
    {
        return $this->selectString;
    }

    private function getValues()
    {
        return $this->Values;
    }

    public function setPredicate($predicate): void
    {
        $this->predicate = $this->exploder($predicate);
    }

    public function setEquals($equals): void
    {
        $this->equals = $this->exploder($equals);
    }

    public function setFields($fields): void//если передана строка - делаю массив, если массив - возвращаю его
    {
        $this->fields = $this->exploder($fields);
    }

    public function setValues($values): void
    {
        $this->values = $this->exploder($values);
    }

    public function createWhereString($sqlString=''): string
    {
        $str = 'WHERE ';
        if ((!isset($this->fields)) or
            (!isset($this->equals)) or
            (!isset($this->values))) {//если нет значения полей, операторов, значений
            $str = '';//не будет и части запроса
        }
        if ((count($this->fields) + count($this->equals) + count($this->values)) != count($this->fields) * 3)//число элементов в массивах не совпадаетт
        {
            $str = '';
        }
        if ($str != '') {//если не стиралась строка - значит как минимум одно простое условие есть
            $str .= $this->fields[0] . ' ' . $this->equals[0] . ' \'' . $this->values[0].'\'';
        }
        //есть какие-то предикаторы - буду формировать в цикле "условие1 + предикатор1 + условие2 + предикатор2 + ..."
        if (isset($this->predicate))
        {
            for ($i = 1; $i <= count($this->predicate); $i++) {
                $str .= ' ' . $this->predicate[$i - 1] . ' ' . $this->fields[$i] . ' ' . $this->equals[$i] . ' \'' . $this->values[$i].'\'';
            }
        }

        $pos=stripos($sqlString,'ORDER BY');//позиция ORDER BY в SELECT-строке
        $strBefore=substr($sqlString,0,$pos);//беру всю строку SQL до ORDER BY
        $strAfter = substr($sqlString,$pos);//и после ORDER BY
        $str = $strBefore.$str.' '.$strAfter;//собираю обший запрос SELECT ... WHERE ... ORDER BY

        return $str;
    }
}