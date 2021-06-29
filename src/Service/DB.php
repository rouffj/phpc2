<?php


class DB
{
    private $connection;

    public function __construct($dsn, $user, $password)
    {
        $this->connection = new \PDO($dsn, $user, $password);
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}