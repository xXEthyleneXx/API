<?php

namespace xXEthyleneXx\Exceptions;

use Exception;

class Config_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
}
class MariaDB_Database_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
}
class Redis_Database_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
}
class Logging_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
}
class API_Exception extends Exception {
    public function __construct(string $message, int $code) {
        throw new Exception($message, $code);
    }
}