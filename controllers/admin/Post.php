<?php

namespace mvc\controllers\admin;

use mvc\controllers\MainController;

//нужно чтоб достучаться до метода вью
use mvc\models\Post as postModel;

//кличка
use mvc\helper\GlobalFilter;

class Post extends MainController//иерарическое наследие позволяет избежать лишний "use", если хочешь добраться до "денег" "деда"а вот как правильно - хз: брать "деньги" у "деда" напрямик через use и extend "дед" или через "отца" через просто extend "отца"
{

    private $model;

    public function __construct()
    {
        $this->setModel(new PostModel());
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function create()
    {
        if (!empty(GlobalFilter::postFilter())) {//если не пустой ПОСТ - создаю запись в БД
            if (empty(GlobalFilter::getParams())) {
                $this->getModel()->setPost(GlobalFilter::postFilter());//записываю всё из $_POST  в модель
            }
        }

        $data = $this->getModel()->getPosts();//выьаскиваю все записи из БД для отображения
        if (is_null($data)) {
            $data = [];
        };
        $this->generate('admin/create', $data);//создание вьюшки
    }

    public function update()
    {
        $data = $this->getModel()->getPosts(GlobalFilter::getParams());//получаю данные по принятому в get-параметре id-iybre

        if (!empty(GlobalFilter::postFilter())) {//если не пустой ПОСТ
            $this->getModel()->updatePost(GlobalFilter::postFilter());//обновляю запись в БД
        }

        if ((!empty(GlobalFilter::getParams())) and (!empty(GlobalFilter::postFilter()))) {
            $data = $this->getModel()->getPosts();
            $this->generate('admin/create', $data);
        } else {
            $this->generate('admin/update', $data);//вьюшка update
        }
    }

    public function delete()
    {
        if (!empty(GlobalFilter::getParams())) {
            $this->getModel()->deletePost(GlobalFilter::getParams());
        }
        $this->generate('admin/create',   $this->getModel()->getPosts());
    }
}