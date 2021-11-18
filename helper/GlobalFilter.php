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

}