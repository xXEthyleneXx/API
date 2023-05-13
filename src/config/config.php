<?php declare(strict_types=1);

namespace xXEthyleneXx\Config;

use xXEthyleneXx\Exceptions\Config_Exception;

/**
 * Configuration Class
 * 
 * Loads the Required Configs for all of the API Plugins
 * 
 * @param string $file_path = "/to/the/config.json"
 */
class Config {
    // Public
    /**
     * MariaDB Config
     * @var array [
     * 
     * "HOSTNAME"=>string,
     * 
     * "PORT"=>int,
     * 
     * "USERNAME"=>string,
     * 
     * "PASSWORD"=>string,
     * 
     * "DATABASE"=>string
     * 
     * ]
     */
    public array $MariaDB;
    public array $RedisDB;
    // Protected
    protected array $config;
    // Definitions
    // Construct
    public function __construct(string $file_path) {
        $this->config = json_decode(file_get_contents($file_path), true);
        $this->checkMariaDB();
        define("MariaDB", $this->MariaDB);
        $this->checkRedisDB();
        define("RedisDB", $this->RedisDB);
    }
    /**
     * MariaDB Config Check System
    */
    protected function checkMariaDB() {
        // MariaDB Config Check
        $MariaDB = [];
        if (isset($this->config["MARIADB"])) {
            // Hostname Check
            if (isset($this->config["MARIADB"]["HOSTNAME"])) {
                $MariaDB["HOSTNAME"] = $this->config["MARIADB"]["HOSTNAME"];
            } else {
                $this->error("MARIADB->HOSTNAME Not Defined In Config", 2);
            }
            // Port Check
            if (isset($this->config["MARIADB"]["PORT"])) {
                $MariaDB["PORT"] = $this->config["MARIADB"]["PORT"];
            } else {
                $this->error("MARIADB->PORT Not Defined In Config", 3);
            }
            // Username Check
            if (isset($this->config["MARIADB"]["USERNAME"])) {
                $MariaDB["USERNAME"] = $this->config["MARIADB"]["USERNAME"];
            } else {
                $this->error("MARIADB->USERNAME Not Defined In Config", 4);
            }
            // Password Check
            if (isset($this->config["MARIADB"]["PASSWORD"])) {
                $MariaDB["PASSWORD"] = $this->config["MARIADB"]["PASSWORD"];
            } else {
                $this->error("MARIADB->PASSWORD Not Defined In Config", 5);
            }
            // Database Check
            if (isset($this->config["MARIADB"]["DATABASE"])) {
                $MariaDB["DATABASE"] = $this->config["MARIADB"]["DATABASE"];
            } else {
                $this->error("MARIADB->DATABASE Not Defined In Config", 6);
            }
            $this->MariaDB = $MariaDB;
        } else {
            $this->error("MARIADB Not Defined In Config", 1);
        }
    }
    /**
     * RedisDB Config Check System
    */
    protected function checkRedisDB() {
        // MariaDB Config Check
        $RedisDB = [];
        if (isset($this->config["REDISDB"])) {
            // Hostname Check
            if (isset($this->config["REDISDB"]["HOSTNAME"])) {
                $RedisDB["HOSTNAME"] = $this->config["REDISDB"]["HOSTNAME"];
            } else {
                $this->error("REDISDB->HOSTNAME Not Defined In Config", 2);
            }
            // Port Check
            if (isset($this->config["REDISDB"]["PORT"])) {
                $RedisDB["PORT"] = $this->config["REDISDB"]["PORT"];
            } else {
                $this->error("REDISDB->PORT Not Defined In Config", 3);
            }
            $this->RedisDB = $RedisDB;
        } else {
            $this->error("REDISDB Not Defined In Config", 1);
        }
    }
    /**
     * Throws Exception to catch for Misconfigured Config
     * 
     * @throws Config_Exception
     */
    protected function error(string $message, int $code) {
        throw new Config_Exception($message, $code);
    }
}
/**
 * MariaDB Connection Information
 * 
 * MariaDB Information Gathered by Config
 * 
 * @return array [
 * 
 *  "HOSTNAME"=>string,
 * 
 *  "PORT"=>int,
 * 
 *  "USERNAME"=>string,
 * 
 *  "PASSWORD"=>string,
 * 
 *  "DATABASE=>string"
 * 
 * ]
 */
class MariaDBC extends Config {
    public function __construct(string $file_path) {
        Config::__construct($file_path);
    }
    public function __get($name) {
        if ($name == "ALL") {
            return MariaDB; 
        } else {
            if (isset(MariaDB[$name])) {
                return MariaDB[$name];
            } else {
                $this->error("MARIADB ['".$name."'] Not Defined", 7);
            }
        }
    }
}
/**
 * RedisDB Connection Information
 * 
 * RedisDB Information Gathered by Config
 * 
 * @return array [
 * 
 *  "HOSTNAME"=>string,
 * 
 *  "PORT"=>int,
 * 
 * ]
 */
class RedisDBC extends Config {
    public function __construct(string $file_path) {
        Config::__construct($file_path);
    }
    public function __get($name) {
        if ($name == "ALL") {
            return RedisDB; 
        } else {
            if (isset(RedisDB[$name])) {
                return RedisDB[$name];
            } else {
                $this->error("REDISDB ['".$name."'] Not Defined", 7);
            }
        }
    }
}