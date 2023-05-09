<?php

namespace xXEthyleneXx;

use Exception;

class API_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
    
}