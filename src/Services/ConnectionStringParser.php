<?php declare(strict_types = 1);

namespace Service\Database\ConnectionStringParser\Services;

use Service\Database\ConnectionStringParser\ValueObjects\Connection;

class ConnectionStringParser
{
    public function parse(string $url): Connection
    {
        $parsedUrl = parse_url($url);

        $connection = new Connection();
        $connection
            ->setScheme($parsedUrl['scheme'])
            ->setUsername($parsedUrl['user'])
            ->setPassword($parsedUrl['pass'])
            ->setHost($parsedUrl['host'])
            ->setPort($parsedUrl['port'])
            ->setDatabase(substr($parsedUrl['path'], 1));

        return $connection;
    }
}
