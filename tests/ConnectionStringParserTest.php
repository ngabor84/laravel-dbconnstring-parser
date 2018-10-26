<?php

namespace Service\Database\ConnectionStringParser\Tests;

use Service\Database\ConnectionStringParser\Facades\ConnectionStringParser as ConnectionStringParserFacade;
use Service\Database\ConnectionStringParser\Services\ConnectionStringParser;
use Service\Database\ConnectionStringParser\ValueObjects\Connection;

class ConnectionStringParserTest extends BaseTestCase
{
    /** @var ConnectionStringParser */
    protected $parser;

    public function setUp(): void
    {
        parent::setUp();
        $this->parser = $this->app->get(ConnectionStringParser::class);
    }

    /**
     * @test
     */
    public function getConnectionStringParserFromContainer(): void
    {
        $this->assertInstanceOf(ConnectionStringParser::class, $this->parser);
    }

    /**
     * @test
     */
    public function parseReturnWithAConnectionObject(): void
    {
        $connection = $this->parser->parse('postgres://username:password@host:5432/database');

        $this->assertInstanceOf(Connection::class, $connection);
    }

    public function connectionStringProvider(): array
    {
        return [
            [
                [
                    'scheme' => 'postgres',
                    'username' => 'username',
                    'password' => 'password',
                    'host' => 'host',
                    'port' => '5432',
                    'database' => 'database',
                ],
                'postgres://username:password@host:5432/database',
            ],
            [
                [
                    'scheme' => 'mysql',
                    'username' => 'username',
                    'password' => 'password',
                    'host' => 'hostname',
                    'port' => '1234',
                    'database' => 'default_schema',
                ],
                'mysql://username:password@hostname:1234/default_schema',
            ],
        ];
    }

    /**
     * @test
     * @dataProvider connectionStringProvider
     */
    public function parseReturnAConnectionObjectSetWithProperValues(array $expected, string $connString): void
    {
        $connection = $this->parser->parse($connString);

        $this->assertEquals($expected['scheme'], $connection->getScheme());
        $this->assertEquals($expected['username'], $connection->getUsername());
        $this->assertEquals($expected['password'], $connection->getPassword());
        $this->assertEquals($expected['host'], $connection->getHost());
        $this->assertEquals($expected['port'], $connection->getPort());
        $this->assertEquals($expected['database'], $connection->getDatabase());
    }

    /**
     * @test
     * @dataProvider connectionStringProvider
     */
    public function parseWorkWellWithFacadeAlso(array $expected, string $connString): void
    {
        $connection = ConnectionStringParserFacade::parse($connString);

        $this->assertEquals($expected['scheme'], $connection->getScheme());
        $this->assertEquals($expected['username'], $connection->getUsername());
        $this->assertEquals($expected['password'], $connection->getPassword());
        $this->assertEquals($expected['host'], $connection->getHost());
        $this->assertEquals($expected['port'], $connection->getPort());
        $this->assertEquals($expected['database'], $connection->getDatabase());
    }
}
