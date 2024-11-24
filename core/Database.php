<?php

namespace app\core;

use PDOException;

class Database
{
    private static $conn;
    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function connect()
    {
        try {
            $connection = sqlsrv_connect($this->config["serverName"], $this->config["connection"]);
            self::$conn = $connection;

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getConnection()
    {

        return self::$conn;
    }
}