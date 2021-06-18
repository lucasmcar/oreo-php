<?php

namespace OreoPhp\Init;

abstract class Bootstrap
{
    private $route;

    abstract protected function initRoutes();

    public function __construct()
    {
        $this->initRoutes();
        $this->oreoRunner($this->getUrl());
    }

    public function setRoutes(array $routes)
    {
        $this->route = $routes;
    }

    public function getRoute()
    {
        return $this->route;
    }

    protected function oreoRunner($url)
    {
        foreach($this->getRoute() as $path => $route)
        {
            if($url == $route['route'])
            {
                $class = "App\\Controllers\\".ucfirst($route['controller']);

                $controller = new $class;

                $action = $route['action'];

                $controller->$action();
            }
        }

    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}