<?php


class DB
{
    private $connection;

    public function __construct($dsn, $user, $password)
    {
        $this->connection = new \PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
        ]);
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}