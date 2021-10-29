<?php

namespace mvc\views;

class View
{
    public static function generate(string $view_path, array $data = [])
    {
        extract($data);//формируем набор переменных
        $file_path = '../views/' . $view_path . '.php';//путь к вьюшке
        if (file_exists($file_path)) {
            include_once $file_path;
        } else {
            throw new \Exception('file' . $file_path . 'absent');
        }
    }
}