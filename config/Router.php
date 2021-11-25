<?php

namespace mvc\config;

use mvc\controllers\ErrorController;


//соотношение урла и неймспейса задаётся в конфиге, где создаётся массив связи между неймспес=>контроллер
//роутер должен лежать в views
//конфиг, контроллерс и прочее - в app
//в конфиге должен лежать индекс.пхп - где живёт массив сопоставлений
//404

class Router
{
    private mixed $config;
    private string $url;

    function __construct()
    {
        $routeConfig = 'config.php';
        $this->config = include_once $routeConfig;
        $this->init();
    }

    public function init()
    {
        if (!empty($_SERVER['REQUEST_URI']))//если не пустой урл - обрабатываем 'REQUEST_URI'  'REDIRECT_URL']
        {
            $this->url = trim($_SERVER['REQUEST_URI'], '/');//убрали слешы
            if (mb_strpos($this->url, '?') != false) {//убрали GET-параметры
                $this->url = mb_substr($this->url, 0, mb_strpos($this->url, '?'));
            }
        }
    }

    public function run()
    {
        $namespace = array_search($this->url, $this->config);

//       echo '</br> NAMESPACE FROM ROUTER: ' . $namespace . '</br>';
//        if (empty($namespace)) {//если корень - даю корневую вьюшку
//            $namespace = 'mvc\controllers\DefaultController@index';
//        }
        {
            if (!$namespace) {
                new ErrorController();
                echo '</br></br>' . "варианты запроса:" . '</br>';
                echo "admin/user/index - даст вьюшку с данными для админуа из модели User " . '</br>';
                echo "admin/post/index -даст иную вьюшку с данными для админа из модели Post" . '</br>';
                echo "user/user/index - даст вьюшку с данными для пользователя из модели User " . '</br>';
                echo "user/post/index -даст иную вьюшку с данными для пользователя из модели Post" . '</br></br>';
                echo "admin, admin/index, user, user/index - дадут вьюшки по умолчанию  для разных зон" . '</br>';
                echo "admin/test,user/test - вызовет метод TEST для разных зон и разные вьюшки к нему" . '</br>';
                echo " " . '</br>';
                return;
            }//404 если не нашли в массиве нужный путь
            $classSmethod = explode('@', $namespace);
            if (class_exists($classSmethod[0])) {
                $class = new $classSmethod[0];
                if (method_exists($class, $classSmethod[1])) {
                    $method = $classSmethod[1];
                    $class->$method();
                } else {
                    new ErrorController();
                }
            } else {
                new ErrorController();
            }
        }
    }
}