<?php

require "../vendor/autoload.php";

use App\Routes\Route;

$route = new Route();

print_r($route->getUrl());

echo "Estamos aqui";

echo "<hr>";
echo "<pre>";
print_r($route->__get('route'));
echo "</pre>";