<?php

$router->add('get', '/', function() use ($container){
    $pdo = $container['db'];
    var_dump($pdo);
    return 'Pagina inicial.';
});
$router->add('post', '/eu/(\d+)', function(){
    return 'PAgina eu.';
});