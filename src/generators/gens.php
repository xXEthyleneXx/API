<?php declare(strict_types=1);

namespace xXEthyleneXx\API;
use Ramsey\Uuid\Uuid;

trait Gens {
    /**
     * Make A UUID
     * 
     * @return string char(36)
     */
    function uuid() {
        return strval(Uuid::uuid4());
    }
    /**
     * Make A Token
     * 
     * @return string char(128)
     */
    function token() {
        return hash("sha512", $this->uuid().$this->uuid().$this->uuid());
    }
}