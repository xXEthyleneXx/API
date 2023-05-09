<?php 
declare(strict_types=1);
namespace xXEthyleneXx;
require "load.php";

use xXEthyleneXx\Config\MariaDBC;
use xXEthyleneXx\Database\MariaDBD;
use xXEthyleneXx\Database\RedisD;
use xXEthyleneXx\Exceptions\API_Exception;
use xXEthyleneXx\Logging;

class API {
    use Gens;
    // Public
    public MariaDBC $MariaDB;

    /**
     * Construct API
     * 
     * @param string $file_path = "/path/to/config.json"
     */
    public function __construct(string $file_path) {
        $this->MariaDB = new MariaDBC($file_path);
    }
}
?>