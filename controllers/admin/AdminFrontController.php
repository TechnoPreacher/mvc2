<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

class AdminFrontController extends MainController
{
    public function def()
    {
      //    echo "метод по умолчанию для админа".'</br>';
        $this->index();//вызываю метод индекс
    }

    public function index()
    {
     //  echo "just admin index method".'</br>';
        // обрщение к генератору родителю
        $this->generate('admin/index');
    }

    public function test()
    {
      //  echo " метод TEST для админа".'</br>';
        $this->generate('admin/test');
    }


}