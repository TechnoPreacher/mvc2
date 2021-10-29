<?php

return array(
   // "mvc\controllers\DefaultController@defaultAction"=>"empty",//для контроллера по умолчанию

    "mvc\controllers\Admin\AdminFrontController@def"=>"admin",//админская зона
    "mvc\controllers\Admin\AdminFrontController@test"=>"admin/test",
    "mvc\controllers\Admin\AdminFrontController@index"=>"admin/index",

    "mvc\controllers\User\UserFrontController@def"=>"user",//пользовательская зона
    "mvc\controllers\User\UserFrontController@test"=>"user/test",
    "mvc\controllers\User\UserFrontController@index"=>"user/index"
    );

