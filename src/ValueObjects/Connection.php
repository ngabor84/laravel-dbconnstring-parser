<?php declare(strict_types=1);

namespace Service\Database\ConnectionStringParser\ValueObjects;

class Connection
{
    private $scheme;
    private $username;
    private $password;
    private $host;
    private $port;
    private $database;

    public function __construct()
    {
        $this->scheme = '';
        $this->username = '';
        $this->password = '';
        $this->host = '';
        $this->port = 0;
        $this->database = '';
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function setDatabase(string $database): self
    {
        $this->database = $database;

        return $this;
    }
}
