<?php 
declare(strict_types=1);
namespace xXEthyleneXx;
require "load.php";

use xXEthyleneXx\Config;
use xXEthyleneXx\Database\MariaDB;
use xXEthyleneXx\Database\Redis;
use xXEthyleneXx\API_Exception;
use xXEthyleneXx\Logging;

class API {
    use Gens;
    // Public
    protected Config $config;

    public function __construct(array $config = null) {
        $this->config = new Config("config.json");
    }
}
?>