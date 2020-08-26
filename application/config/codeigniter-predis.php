<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['redis'] = [];

switch (ENVIRONMENT) {
    case 'development':
    case 'testing':
        $config['redis'] = [
            'default_server' => 'localhost',
            'servers' => [
                'localhost' => [
                    'scheme' => 'tls',
                    'host' => 'private-db-redis-sgp1-23648-do-user-2193651-0.a.db.ondigitalocean.com',
                    'port' => 25061,
                    'password' => 'm46qyh72evakgt5z',
                    'database' => 0,
                ],
                'another_instance_example' => [
                    'scheme' => 'tcp',
                    'host' => '127.0.0.1',
                    'port' => 6379,
                    'password' => null,
                    'database' => 1,
                ],
                'not_connected_server' => [
                    'scheme' => 'tcp',
                    'host' => '127.0.0.1',
                    'port' => 6379,
                    'password' => null,
                    'database' => 1,
                ],
            ],
        ];
        break;
    case 'homologation':
        break;
    case 'production':
        break;
    default:
        throw new Exception('The application environment is not set correctly.');
}
