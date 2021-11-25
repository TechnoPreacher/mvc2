<?php

namespace mvc\controllers;


use mvc\controllers\admin\User;

class DefaultController extends MainController
{
    public function index()
    {
        $dataFromUser = new User();
        $this->generate('commonview',$dataFromUser->data_());
    }
}