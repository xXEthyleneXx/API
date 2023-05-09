<?php declare(strict_types=1);

namespace xXEthyleneXx;

use xXEthyleneXx\API_Exception;

class Config {
    public array $config = [
        "INFO"=>[
            "NAME"=>NULL,
            "VERSION"=>NULL
        ],
        "DATABASE"=>[
            "MARIADB"=>[
                "ENABLED"=>false,
                "HOSTNAME"=>"127.0.0.1",
                "PORT"=>3306,
                "USERNAME"=>NULL,
                "PASSWORD"=>NULL,
                "DATABASE"=>NULL
            ],
            "REDIS"=>[
                "ENABLED"=>false,
                "HOSTNAME"=>"127.0.0.1",
                "PORT"=>6379,
            ]
        ]
    ];
    public function __construct(string $file) {
        
    }
}