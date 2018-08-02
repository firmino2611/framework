<?php

require __DIR__ . '/vendor/autoload.php';

$router = new Action\Framework\Router;

$router->add('get', '/', function(){
    return 'PAgina inicial.';
});
$router->add('post', '/eu/(\d+)', function(){
    return 'PAgina eu.';
});

try{
    echo $router->run();
}catch(\Action\Framework\Exceptions\HttpException $e){
    echo $e->getMessage();
}
