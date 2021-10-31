<?php

namespace mvc\models;

class Post
{
    public array $adminArray = [
        "12" => "120",
        "13" => "121",
        "14" => "122",
        "салаватюлаев" => "местный мачо с красными глазами",
        "массив" => ['100', 500, 'тыща']
    ];

    public array $userArray = [
        "массив2" => ['100', 500, 'тыща'],
        "q" => 'тут тоже что-то есть'
    ];

    public function getUserData()
    {
        return $this->userArray;
    }

    public function getAdminData()
    {
        return $this->adminArray;
    }

}