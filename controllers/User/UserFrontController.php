<?php

namespace mvc\controllers\User;

use mvc\controllers\MainController;

class UserFrontController extends MainController
{
    public function def()
    {
        // echo "метод по умолчанию для юзера";
        $this->index();//вызываю метод индекс
    }

    public function index()
    {
        // обрщение к генератору родителю
        $this->generate('user/index');
    }

    public function test()
    {
        // echo " метод TEST для юзера";
        $this->generate('user/test');
    }
}