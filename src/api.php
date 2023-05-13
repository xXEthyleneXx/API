<?php 
declare(strict_types=1);
namespace xXEthyleneXx;
require "load.php";

use xXEthyleneXx\Config\Config;
use xXEthyleneXx\Config\MariaDBC;
use xXEthyleneXx\Config\RedisDBC;
use xXEthyleneXx\Database\MariaDBD;
use xXEthyleneXx\Database\RedisDBD;
use xXEthyleneXx\Exceptions\API_Exception;
use xXEthyleneXx\Logging;

class API {
    // Generators
    use Gens;
    // Configs
    public Config|false $Config;
    public MariaDBC|false $MariaDB;
    public RedisDBC|false $RedisDB;
    // Flag Variables
    public bool $Exceptions = false;
    /**
     * Construct API
     * 
     * @param string $file_path = "/path/to/config.json"
     */
    public function __construct(string $file_path = null, Config $Config = null, bool $Exceptions = false) {
        $this->Exceptions = $Exceptions;
        if (is_string($file_path)) {
            $this->Config = new Config($file_path);
        } else {
            if (is_object($Config)) {
                $this->Config = $Config;
            } else {
                if ($this->Exceptions == true) {
                    throw new API_Exception("API | No Source of Creds.json or defined Object", 1);
                } else {
                    return false;
                }
            }
        }
    }
    public function enableMariaDB() {
        if ($this->Config == null) {
            if ($this->Exceptions == true) {
                throw new API_Exception("MariaDB | Config Not Initialized", 1);
            } else {
                return false;
            }
        } else {
            $this->MariaDB = new MariaDBC($this->Config);
            return true;
        }
    }
    public function enableRedisDB() {
        if ($this->Config == null) {
            if ($this->Exceptions == true) {
                throw new API_Exception("RedisDB | Config Not Initialized", 1);
            } else {
                return false;
            }
        } else {
            $this->RedisDB = new RedisDBC($this->Config);
            return true;
        }
    }
}
?>