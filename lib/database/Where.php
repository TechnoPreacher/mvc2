<?php
//создаёт простую строку типа WHERE, корректно разбирая:

//1) обычную строку тупо приклеивая к её началу WHERE

//2) ассоциативный масив формата [key1 => value1, key2 => value2,key3 => value3 ... ], собирая из него строку
//WHERE key1 = value1 AND key2=value2 AND key3=value3 ...

//3) массив формата ['like',['key'=>'value']], собирая строку
// WHERE key LIKE value


//нужные кавычки также предусмотрены



namespace mvc\lib\database;


class Where
{
    // private $fields;//поля для  отбора в виде массива
    // private $equals;//операторы сравнения в виде массива
    // private $values;//значения для отбора =, >, <, <=, в виде массива
    // private $predicate;//предикаты типа AND, O

    private $selectString = '';//если уже сформирована строка SELECT чтоб вставить WHERE до  GROUP BY

    private $conditions;//уcловия



    private function getSelectString(): string
    {
        return $this->selectString;
    }

    public function setConditions($conditions): void
    {
        $this->conditions = $conditions;
    }

    public function getConditions()
    {
        return $this->conditions;
    }


    public function createWhereString($sqlString = ''): string
    {

        $str = ' WHERE ';//начало части WHERE
        $strConditions = '';//для остальных

        if (empty($this->conditions)) {//если нет условий, то
            $str = '';//не будет и WHERE - части запроса
        } else {//если не пустое - есть два варианта или строка или массив, что нужно спарсить

            if (is_string($this->conditions)) { //если строка
                $strConditions = $this->conditions;//просто залью эту строку условий в буфер
            }
            $likeStr = '';//для LIKE - условия
            if (is_array($this->conditions)) {//если массив
                $arr = $this->conditions;//беру его во временную переменную
                foreach ($arr as $key => $value) {//ползу по массиву
                    if (is_int($key)) { //если ключ это число -> значит встретил лайк-условие или массив!
                        if (!is_array($value)) {
                            $likeStr = strtoupper($value);//превращаю like в LIKE
                            continue;//ухожу с этой итерации
                        }
                    }
                    if (is_array($value)) //внутренний массив - для сборки like- строки
                    {
                        foreach ($value as $k => $v) {
                            $likeStr = $k . ' ' . $likeStr . ' \'' . $v . '\' AND'; //собираю строку c LIKE
                        }
                    } else
                        $likeStr = $likeStr . ' ' . $key . ' = \'' . $value . '\' AND';//собираю строку без LIKE
                }
                $likeStr = mb_substr($likeStr, 0, mb_strlen($likeStr) - 3);//вырезаю последний AND
                $strConditions = $likeStr;
            }
            $str .= $strConditions;//str+conditions
        }
        return $str;
    }
}


//        if ((!isset($this->fields)) or
//            (!isset($this->equals)) or
//            (!isset($this->values))) {
//            //если нет значения полей, операторов, значений
//            $str = '';//не будет и части запроса
//        }

//   if ((count($this->fields) + count($this->equals) + count($this->values)) != count($this->fields) * 3)//число элементов в массивах не совпадаетт
// {
//   $str = '';
// }

//  if ($str != '') {//если не стиралась строка - значит как минимум одно простое условие есть
//    $str .= $this->fields[0] . ' ' . $this->equals[0] . ' \'' . $this->values[0] . '\'';
// }
//есть какие-то предикаторы - буду формировать в цикле "условие1 + предикатор1 + условие2 + предикатор2 + ..."
//  if (isset($this->predicate)) {
//    for ($i = 1; $i <= count($this->predicate); $i++) {
//      $str .= ' ' . $this->predicate[$i - 1] . ' ' . $this->fields[$i] . ' ' . $this->equals[$i] . ' \'' . $this->values[$i] . '\'';
//}
// }

//$pos=stripos($sqlString,'ORDER BY');//позиция ORDER BY в SELECT-строке
//$strBefore=substr($sqlString,0,$pos);//беру всю строку SQL до ORDER BY
//$strAfter = substr($sqlString,$pos);//и после ORDER BY
//$str = $strBefore.$str.' '.$strAfter;//собираю обший запрос SELECT ... WHERE ... ORDER BY


