[ ![Codeship Status for ngabor84/laravel-dbconnstring-parser](https://app.codeship.com/projects/346c40b0-bb1a-0136-f167-06d892cdb3f2/status?branch=master)](https://app.codeship.com/projects/312558)
[![GitHub license](https://img.shields.io/github/license/ngabor84/laravel-dbconnstring-parser.svg)](https://github.com/ngabor84/laravel-dbconnstring-parser/blob/master/LICENSE)

# Database Connection String Parser
Small service to parse database connection string into parts.

## About
This package allows you to parse database connection string into parts.

## Installation
Require the ngabor84/laravel-dbconnstring-parser package in your composer.json and update your dependencies:
```bash
composer require laravel-dbconnstring-parser
```

## Usage with Laravel
Add the service provider to the providers array in the config/app.php config file as follows:
```php
'providers' => [
    ...
    \Service\Database\ConnectionStringParser\Providers\ServiceProvider::class,
]
```

In your database config file you can use it like this:
```php
$connection = ConnectionStringParser::parse(env('DATABASE_URL'));

return [
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $connection->getHost(),
            'username' => $connection->getUserName(),
            'password' => $connection->getPassword(),
            'port' => $connection->getPort(),
            'database' => $connection->getDatabase(),
            'charset' => 'utf8',
            'options' => array(
                PDO::ATTR_PERSISTENT => true
            )
        ]
    ]
];
```

## Usage with Lumen
Add the following snippet to the bootstrap/app.php file under the providers section as follows:
```php
// uncomment this line to enable Facades
$app->withFacades();
...
$app->register(\Service\Database\ConnectionStringParser\Providers\ServiceProvider::class);
```

In your database config file you can use it like this:
```php
$connection = ConnectionStringParser::parse(env('DATABASE_URL'));

return [
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $connection->getHost(),
            'username' => $connection->getUserName(),
            'password' => $connection->getPassword(),
            'port' => $connection->getPort(),
            'database' => $connection->getDatabase(),
            'charset' => 'utf8',
            'options' => array(
                PDO::ATTR_PERSISTENT => true
            )
        ]
    ]
];
```
