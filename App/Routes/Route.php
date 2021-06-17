<?php

namespace App\Routes;

class Route
{

    private $route;

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

    public function initRoutes()
    {
        //rotas modelos, apagar depois
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        );


        $this->setRoutes($routes);
    }

    public function oreoRunner($url)
    {
        echo $url;
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

    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}