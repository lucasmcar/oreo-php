<?php

namespace App\Routes;

class Route
{

    private $route;

    public function __construct()
    {
        $this->initRoutes();
    }

    public function __set($name, array $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function initRoutes()
    {
        //rotas modelos, apagar depois
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        );

        $routes['modelo'] = array(
            'route' => '/modelo',
            'controller' => 'IndexController',
            'action' => 'modelo'
        );

        $this->__set('route', $routes);
    }

    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}