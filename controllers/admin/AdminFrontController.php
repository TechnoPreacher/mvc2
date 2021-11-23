<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

class AdminFrontController extends MainController
{
    public function def()
    {
        $this->index();//вызываю метод индекс
    }

    public function index()
    {

        $this->generate('admin/index');
    }

    public function test()
    {
        $this->generate('admin/test');
    }


}