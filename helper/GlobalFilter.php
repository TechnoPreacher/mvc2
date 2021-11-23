<?php

namespace mvc\helper;

class GlobalFilter
{

    const EXCEPTIONS = [
        "send",
    ];

    public static function postFilter(): array
    {
        $result = [];
        foreach ($_POST as $key => $value) {
            if (false === array_search($key, self::EXCEPTIONS)) {//статическая функция и её вызов через ::
                $result[$key] = $value;
            }
        }

        return $result;
    }


    public static function getParams(): array//статическая функция, отдающая гет-параметры (без урла)
    {
        $filteredArray = [];
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value)
                if ($key !== 'url')
                {
                   $filteredArray= [$key => $value];
                }

        }
        return $filteredArray;
    }

}