<?php

namespace Breeze\Identity;

use Breeze\Doctrine\Factory\DoctrineContext;

return [
    'service_manager' => [
        'factories' => [
            Context\Register::class => DoctrineContext::class,
        ],
    ],

    'schema' => [
        'mutations' => [
            [
                'name'    => Mutation\Register::class,
                'context' => Context\Register::class
            ]
        ]
    ],

    'doctrine' => [
        'drivers' => [
            BASE_PATH . '/module/Account/src/Document'
        ]
    ]
];
