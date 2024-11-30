<?php

namespace app\cores;

use PDO;

class Database
{
    private array $config;
    private static PDO $pdo;

    public function __construct(array $config)
    {
        $this->config = $config;
        $dsn = "sqlsrv:Server={$this->config["serverName"]};Database={$this->config["connection"]["database"]};";
        $uid = $this->config["connection"]["uid"];
        $pwd = $this->config["connection"]["PWD"];
        self::$pdo = new PDO($dsn, $uid, $pwd);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public static function getConnection(): PDO
    {
        return self::$pdo;
    }


}