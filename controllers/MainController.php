<?php
//родитель для привязки вьюшек

namespace mvc\controllers;

use mvc\views\View;

class MainController
{
    protected function generate(string $path, array $data = [])
    {
        View::generate($path,$data);
    }
}