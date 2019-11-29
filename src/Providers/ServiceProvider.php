<?php declare(strict_types=1);

namespace Service\Database\ConnectionStringParser\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Service\Database\ConnectionStringParser\Services\ConnectionStringParser;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ConnectionStringParser::class, static function () {
            return new ConnectionStringParser();
        });
    }
}
