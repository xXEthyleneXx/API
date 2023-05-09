<?php declare(strict_types=1);

namespace xXEthyleneXx\API;

use Exception;
use mysqli;
use xXEthyleneXx\Logging;
use xXEthyleneXx\Database\{MariaDB, Redis};
use xXEthyleneXx\Gens;

class API {
    use Gens;
    public function __construct() {
        $var = Gens::uuid();
    }
}
?>