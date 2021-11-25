<?php

return array(

    "mvc\controllers\DefaultController@index"=>"",//для корректной обработки пустоты

    "mvc\controllers\Admin\AdminFrontController@def"   => "admin",//админская зона
    "mvc\controllers\Admin\AdminFrontController@index" => "admin/index",
    "mvc\controllers\Admin\User@index" => "admin/user/index",
    "mvc\controllers\Admin\Post@index" => "admin/post/index",

    "mvc\controllers\Admin\Post@create" => "admin/post/create",
    "mvc\controllers\Admin\Post@update" => "admin/post/update",
    "mvc\controllers\Admin\Post@delete" => "admin/post/delete",


    "mvc\controllers\Admin\User@create" => "user/post/create",
    "mvc\controllers\Admin\User@update" => "user/post/update",
    "mvc\controllers\Admin\User@delete" => "user/post/delete",


    "mvc\controllers\User\UserFrontController@def"   => "user",
    "mvc\controllers\User\UserFrontController@index" => "user/index",

    "mvc\controllers\User\User@index" => "user/user/index",
    "mvc\controllers\User\Post@index" => "user/post/index",
);

// "mvc\controllers\DefaultController@defaultAction"=>"empty",//для контроллера по умолчанию
