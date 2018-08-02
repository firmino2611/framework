<?php

namespace Action\Framework;

use Action\Framework\Exceptions\HttpException;

class Router
{
    private $routes = [];

    public function add(string $method, string $patterm, $callback){
        $patterm = '/^'.str_replace('/', '\/', $patterm).'$/';

        $this->routes[$method][$patterm] = $callback;
    }

    public function getCurrenteUrl(){
        $url = $_SERVER['PATH_INFO'] ?? '/';
        if(strlen($url) > 1){
            $url = rtrim($url, '/');
        }

        return $url;
    }

    public function run(){
        $url = $this->getCurrenteUrl();
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (empty($this->routes[$method])) {
            throw new HttpException('Pagina nao encontrada', '404');
        }

        foreach($this->routes[$method] as $route => $action){
            if(preg_match($route, $url, $params)){
                return $action($params);
            }
        }
        throw new HttpException('Pagina nao encontrada', '404');
    }
}
