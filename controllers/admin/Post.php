<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

//нужно чтоб достучаться до метода вью

use mvc\models\Post as postModel;

//кличка

class Post extends MainController//иерарическое наследие позволяет избежать лишний "use", если хочешь добраться до "денег" "деда"а вот как правильно - хз: брать "деньги" у "деда" напрямик через use и extend "дед" или через "отца" через просто extend "отца"
{
    public function index()
    {
        $obj = new PostModel();
        $data = $obj->getAdminData();
        $this->generate('admin/post', $data);
    }
}