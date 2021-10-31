<?php

namespace mvc\controllers\admin;

use mvc\models\User as UserModel;

//кличка

class User extends AdminFrontController
//иерарическое наследие позволяет избежать лишний "use", если хочешь добраться до "денег" "деда"
//а вот как правильно: брать "деньги" у "деда" напрямик через use и extend "дед" или через "отца" через просто extend "отца"
{
    public function index()
    {
        $obj = new UserModel();
        $data = $obj->getAdminData();
        $this->generate('admin/user', $data);
    }
}