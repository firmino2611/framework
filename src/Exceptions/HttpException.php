<?php

namespace Action\Framework\Exceptions;

class HttpException extends \Exception{

    public function __construct($message, $code, \Exeception $previus = null ){
        http_response_code($code);
        parent::__construct($message, $code, $previus);
    }
}