# Database Connection String Parser
Small service to parse database connection string into parts.

## About
This package allows you to parse database connection string into parts.

## Installation
Require the ngabor84/laravel-escher-auth package in your composer.json and update your dependencies:
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

## Usage with Lumen
Add the following snippet to the bootstrap/app.php file under the providers section as follows:
```php
$app->register(\Service\Database\ConnectionStringParser\Providers\ServiceProvider::class);
```

