<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

use mvc\models\User as UserModel;


use mvc\helper\GlobalFilter;


class User extends MainController//иерарическое наследие позволяет избежать лишний "use", если хочешь добраться до "денег" "деда"а вот как правильно - хз: брать "деньги" у "деда" напрямик через use и extend "дед" или через "отца" через просто extend "отца"
{

    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function data_()
    {
        if (!empty(GlobalFilter::postFilter())) {//если не пустой ПОСТ - создаю запись в БД
            if (empty(GlobalFilter::getParams())) {
                $this->getModel()->setUser(GlobalFilter::postFilter());//записываю всё из $_POST  в модель
            }
        }

        $data = $this->getModel()->getUsers();//выьаскиваю все записи из БД для отображения
        if (is_null($data)) {
            $data = [];
        };
        return $data;
    }

    public function create()
    {

        $this->generate('user/create', $this->data_());//создание вьюшки
    }

    public function update()
    {
        $data = $this->getModel()->getUsers(GlobalFilter::getParams());//получаю данные по принятому в get-параметре id-iybre

        if (!empty(GlobalFilter::postFilter())) {//если не пустой ПОСТ
            $this->getModel()->updateUser(GlobalFilter::postFilter());//обновляю запись в БД
        }

        if ((!empty(GlobalFilter::getParams())) and (!empty(GlobalFilter::postFilter()))) {
            $data = $this->getModel()->getUsers();
            $this->generate('user/create', $data); //ДЛЯ РЕДИРЕКТА: header(string $header, bool $replace = true, int $response_code = 0)
        } else {
            $this->generate('user/update', $data);//вьюшка update
        }
    }

    public function delete()
    {
        if (!empty(GlobalFilter::getParams())) {
            $this->getModel()->deleteUser(GlobalFilter::getParams());
        }
        $this->generate('user/create', $this->getModel()->getUsers());
    }
}







