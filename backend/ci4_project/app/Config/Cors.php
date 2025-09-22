<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Cors extends BaseConfig
{
    public array $default = [
        'allowedOrigins' => [
            'http://localhost:4200', // Angular dev
            'https://myapp.com',     // Production
        ],

        'allowedOriginsPatterns' => [
            'https://.*\.myapp\.com',
        ],

        'supportsCredentials' => true,

        'allowedHeaders' => [
            'Content-Type',
            'Authorization',
            'X-Requested-With',
        ],

        'exposedHeaders' => [],

        'allowedMethods' => [
            'GET',
            'POST',
            'OPTIONS',
            'PUT',
            'DELETE',
        ],

        'maxAge' => 7200,
    ];
}
