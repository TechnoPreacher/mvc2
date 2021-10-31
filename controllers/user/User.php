<?php

namespace mvc\controllers\user;

use mvc\controllers\MainController;

use mvc\models\User as UserModel;

//кличка

class User extends MainController
{
    public function index()
    {
        $obj = new UserModel();
        $data = $obj->getUserData();
        $this->generate('user/user', $data);
    }
}