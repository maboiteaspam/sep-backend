<? return [
    "dev"=>[
        "app_name"=>"love_around_backend",
        "intl_path"=>[
            __DIR__."/intl/"
        ],
        "view_models_path"=>[
            __DIR__."/view_models/"
        ],
        "www_path"=>[
            __DIR__."/www/"
        ],
        "router"=>[
            'mode' => 'development',
            'debug' => !true,
            'templates.path' => [
                __DIR__."/templates/"
            ],
            'log.level' => \Slim\Log::DEBUG
        ],
    ],
];
