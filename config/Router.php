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
    protected $controller;
    protected $method;
    private $config;
    private $url;

    function __construct()
    {
        $routeConfig = 'config.php';
        $this->config = include_once $routeConfig;
        $this->init();
    }

    public function init()
    {
        if (!empty($_SERVER['REQUEST_URI']))//если не пустой урл - обрабатываем
        {
            $this->url = trim($_SERVER['REQUEST_URI'], '/');//убрали слешы
        }
    }

    public function run()
    {
        $namespace = array_search($this->url, $this->config);
        // echo $namespace.'</br>';
        if (!$namespace) {
            // echo "ничего нет".'</br>';
            new ErrorController();
            echo '</br></br>' . "варианты запроса: admin, admin/test, admin/index, user, user/test, user/index" . '</br>';

            return;
        }//404 если не нашли в массиве нужный путь

        $classSmethod = explode('@', $namespace);

        if (class_exists($classSmethod[0])) {
            $obj = new $classSmethod[0];
            if (method_exists($obj, $classSmethod[1])) {
                $mn = $classSmethod[1];
                $obj->$mn();
            } else {
                new ErrorController();
            }
        } else {
            new ErrorController();
        }
    }
}