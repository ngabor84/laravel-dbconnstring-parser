<?php declare(strict_types=1);

namespace Service\Database\ConnectionStringParser\Facades;

use Illuminate\Support\Facades\Facade;
use Service\Database\ConnectionStringParser\Services\ConnectionStringParser as ConnectionStringParserService;

class ConnectionStringParser extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ConnectionStringParserService::class;
    }
}
