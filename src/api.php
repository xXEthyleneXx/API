<?php 
declare(strict_types=1);
namespace xXEthyleneXx;
require "load.php";

use xXEthyleneXx\Config\Config;
use xXEthyleneXx\Config\MariaDBC;
use xXEthyleneXx\Config\RedisDBC;
use xXEthyleneXx\Database\MariaDBD;
use xXEthyleneXx\Database\RedisD;
use xXEthyleneXx\Exceptions\API_Exception;
use xXEthyleneXx\Logging;

class API {
    // Generators
    use Gens;
    // Configs
    protected Config $config;
    public MariaDBC $MariaDBC;
    public RedisDBC $RedisDBC;
    /**
     * Construct API
     * 
     * @param string $file_path = "/path/to/config.json"
     */
    public function __construct(string $file_path) {
        $this->config = new Config($file_path);
        $this->MariaDBC = new MariaDBC();
        $this->RedisDBC = new RedisDBC();
        echo($this->MariaDBC->ALL);
    }
}
?>