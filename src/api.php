<?php 
declare(strict_types=1);
namespace xXEthyleneXx;
require "load.php";

use xXEthyleneXx\Config;
use xXEthyleneXx\Database\MariaDBD;
use xXEthyleneXx\Database\RedisD;
use xXEthyleneXx\Exceptions\API_Exception;
use xXEthyleneXx\Logging;

class API {
    // Generators
    use Gens;
    // Configs
    protected Config $config;
    /**
     * Construct API
     * 
     * @param string $file_path = "/path/to/config.json"
     */
    public function __construct(string $file_path) {
        $this->config = new Config($file_path);
    }
}
?>