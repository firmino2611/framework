<?php

use  Pimple\Container;

$container = new Container();

$container['db'] = function(){
    $dsn = 'mysql:host=localhost;dbname=project_manager';
    $username = 'lucas';
    $password = 'root';
    $options = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];
    $pdo = new \PDO($dsn, $username, $options);

    $pdo->setAttribute(\PDO::ATTR_ERROMODE, \PDO::ERROMODE_EXCEPTION);

    return $pdo;
};