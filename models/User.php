<?php

namespace mvc\models;

class User
{
    public $userArray = [
        "олень" => "не тюлень",
        "тюлень" => "не олень",
        "день" => "не ночь",
        "человек" => [
            "никто",
            "не",
            "может",
            "тебе",
            "помочь"
        ]
    ];

    public $adminArray = [
        "данные" => "не те что нужно",
        "течтонужно" => ["очень", "важные", "данные"]
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