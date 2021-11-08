<?php

return array(

    "mvc\controllers\Admin\AdminFrontController@def" => "admin",//админская зона
    "mvc\controllers\Admin\AdminFrontController@test" => "admin/test",
    "mvc\controllers\Admin\AdminFrontController@index" => "admin/index",

    "mvc\controllers\Admin\User@index" => "admin/user/index",//работа с моделью USER
    "mvc\controllers\Admin\Post@index" => "admin/post/index",//работа с моделью POST

    "mvc\controllers\User\UserFrontController@def" => "user",//пользовательская зона
    "mvc\controllers\User\UserFrontController@test" => "user/test",
    "mvc\controllers\User\UserFrontController@index" => "user/index",

    "mvc\controllers\User\User@index" => "user/user/index",//работа с моделью USER
    "mvc\controllers\User\Post@index" => "user/post/index",//работа с моделью POST
);

// "mvc\controllers\DefaultController@defaultAction"=>"empty",//для контроллера по умолчанию
