<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

class AdminFrontController extends MainController
{
    public function def()
    {
       // echo "метод по умолчанию для админа";
        $this->index();//вызываю метод индекс
    }

    public function index()
    {
    //    echo "just admin index method";
        // обрщение к генератору родителю
        $this->generate('admin/index');
    }

    public function test()
    {
       // echo " метод TEST для админа";
        $this->generate('admin/test');
    }
}