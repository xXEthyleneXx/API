<?php declare(strict_types=1);

namespace xXEthyleneXx;

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
    // Protected
    protected array $config;
    // Definitions
    // Construct
    public function __construct(string $file_path) {
        $this->config = json_decode(file_get_contents($file_path), true);
        $this->checkMariaDB();
        define("MariaDB", $this->MariaDB);
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
     * MariaDB Connection Information
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
    public function MariaDB() {
        return MariaDB;
        /**
         * MariaDB HOSTNAME
         * 
         * @var string HOSTNAME
         */
        function HOSTNAME() {
            return MariaDB["HOSTNAME"];
        }
        /**
         * MariaDB PORT
         * 
         * @return string PORT
         */
        function PORT() {
            return MariaDB["PORT"];
        }
        /**
         * MariaDB USERNAME
         * 
         * @return string USERNAME
         */
        function USERNAME() {
            return MariaDB["USERNAME"];
        }
        /**
         * MariaDB PASSWORD
         * 
         * @return string PASSWORD
         */
        function PASSWORD() {
            return MariaDB["PASSWORD"];
        }
        /**
         * MariaDB DATABASE
         * 
         * @return string DATABASE
         */
        function DATABASE() {
            return MariaDB["DATABASE"];
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