<?php

class Router
{
    private $routes;
    private $request_status = false;

    public function __construct()€
    {
        $routPath = ROOT.'/config/routes.php';
        $this->routes = include($routPath);
    }

    public function  request_error()
    {
        //include(ROOT . '/views/error/404.php');
        //!!!!!!!!!!!!!!!
        exit;
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return null;
    }

    public function run()
    {
        //Get request string
        $uri = $this->getURI();

        //Check the value of the request
        foreach ($this->routes as $pattern => $path)
        {
            if (preg_match("~(/|^){$pattern}/?$~", $uri))
            {
                $internalRoute = preg_replace("~{$pattern}~", $path, $uri);
                //Determine controller, action, params
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));
                $params = $segments;

                //Connecting controller class
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile))
                    include_once($controllerFile);
                else
                    $this->request_error();
                //Create controller object
                $controllerObject = new $controllerName;
                //Call controller's action
                $result = call_user_func_array(array($controllerObject, $actionName), $params);
                if ($result)
                {
                    $this->request_status = true;
                    break;
                }
            }
        }
        if ($this->request_status === false)
            $this->request_error();
    }
}
