<?php

namespace Service\Database\ConnectionStringParser\Tests;

use Orchestra\Testbench\TestCase;
use Service\Database\ConnectionStringParser\Providers\ServiceProvider;

abstract class BaseTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }
}
