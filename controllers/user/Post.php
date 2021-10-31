<?php

namespace mvc\controllers\user;

use mvc\controllers\MainController;

//нужно чтоб достучаться до метода вью

use mvc\models\Post as postModel;

//кличка для модели

class Post extends MainController
{
    public function index()
    {
        $obj = new postModel();
        $data = $obj->getUserData();
        $this->generate('user/post', $data);
    }
}