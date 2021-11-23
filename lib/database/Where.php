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
        return $sqlString.$str;
    }
}
