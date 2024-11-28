<?php


namespace app\constant;

require_once "helpers/env.php";

class Config
{
    public static function getConfig(): array
    {
        return [
            "serverName" => getenv("SERVER_NAME"),
            "connection" => [
                "database" => getenv("DB_NAME"),
                "uid" => getenv("UID"),
                "PWD" => getenv("PWD")
            ]
        ];
    }
}

