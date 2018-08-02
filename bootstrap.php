<?php

require __DIR__ . '/vendor/autoload.php';

$router = new Action\Framework\Router;

require __DIR__ . '/config/routes.php';
require __DIR__ . '/config/containers.php';

try{
    echo $router->run();
}catch(\Action\Framework\Exceptions\HttpException $e){
    echo $e->getMessage();
}
