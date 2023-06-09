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
    public array $Info;
    public array $MariaDB;
    public array $RedisDB;
    // Protected
    protected array $config;
    // Construct
    public function __construct(string $file_path) {
        $this->config = json_decode(file_get_contents($file_path), true);
        $this->checkMariaDB();
        $this->checkRedisDB();
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
class MariaDBC extends Config {
    protected $flag = false;
    protected Config $MariaDBC;
    public function __construct(Config $config = null, string $file_path = null) {
        if (is_object($config)) {
            $this->flag = true;
        } else {
            Config::__construct($file_path);
            $this->flag = false;
        }
    }
    public function __get($name) {
        if ($this->flag == false) {
            if ($name == "ALL") {
                return $this->MariaDB[$name];
            } else {
                return $this->MariaDB;
            }
        } else {
            if ($name == "ALL") {
                return $this->MariaDBC->MariaDB;
            } else {
                return $this->MariaDBC->MariaDB[$name];
            }
        }
    }
}
class RedisDBC extends Config {
    protected $flag = false;
    protected Config $RedisDBC;
    public function __construct(Config $config = null, string $file_path = null) {
        if (is_object($config)) {
            $this->flag = true;
        } else {
            Config::__construct($file_path);
            $this->flag = false;
        }
    }
    public function __get($name) {
        if ($this->flag == false) {
            if ($name == "ALL") {
                return $this->RedisDB[$name];
            } else {
                return $this->RedisDB;
            }
        } else {
            if ($name == "ALL") {
                return $this->RedisDBC->RedisDB;
            } else {
                return $this->RedisDBC->RedisDB[$name];
            }
        }
    }
}