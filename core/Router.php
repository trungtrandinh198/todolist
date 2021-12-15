<?php

namespace core;

use app\controllers;

class Router {

    protected $routes = [];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if(array_key_exists($uri, $this->routes[$requestType]))
        {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new \Exception("No route defined for this URI.");
    }

    protected function callAction($controller, $action)
    {
        $controller = "app\\controllers\\{$controller}";
        if(!method_exists($controller, $action)) {
            throw new \Exception(
                "{$controller} dose not response to the {$action} action."
            );
        }
        return (new $controller)->$action();
    }
}
