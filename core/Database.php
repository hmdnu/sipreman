<?php

namespace app\core;

class Database
{
    private static $conn;
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function connect(): void
    {
        $connection = sqlsrv_connect($this->config["serverName"], $this->config["connection"]);
        self::$conn = $connection;

        if (!$connection) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public static function getConnection()
    {

        return self::$conn;
    }
}