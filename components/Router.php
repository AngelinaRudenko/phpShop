<?php

class Router
{
    private $routes;//маршруты

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    //возвращает строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() //анализ запроса и передача управления
    {
        //print_r($this->routes);

        //получить строку запроса
        $uri = $this->getURI();
        //поиск строки в маршрутах
        foreach ($this->routes as $uriPattern => $path)
        {
            //сравниваем строка запроса и маршруты
            //$uriPattern - это то, что прописано в маршрутах
            if (preg_match("~$uriPattern~", $uri))
            {
                //получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~",$path, $uri);

                //оперделить какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                //array_shift - первый эл-т в массиве
                $controllerName = array_shift($segments).'Controller';
                //upper case first - первую букыу заглавной
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                //подключить файл класса контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile))
                {
                    include_once($controllerFile);
                }

                //создать объект, вызвать action
                $controllerObject = new $controllerName;
                //$result = $controllerObject->$actionName($parameters);//передает массив параметров
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null)
                {
                    break;
                }
            }
        }

    }
}
