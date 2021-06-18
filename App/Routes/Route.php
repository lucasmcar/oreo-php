<?php

namespace App\Routes;

use OreoPhp\Init\Bootstrap;

class Route extends Bootstrap
{
    protected function initRoutes()
    {
        //rotas modelos, apagar depois
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        );

        $this->setRoutes($routes);
    }

}