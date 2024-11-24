#!/usr/bin/env php

<?php

use app\core\Database;

require_once "helpers/migration.php";
require_once "vendor/autoload.php";

$config = [
    "serverName" => getenv("SERVER_NAME"),
    "connection" => [
        "database" => getenv("DB_NAME"),
        "uid" => getenv("UID"),
        "PWD" => getenv("PWD")
    ]
];

$database = new Database($config);
$database->connect();

//$migrations = migrate();
$commands = [
    "tailwind" => function () {
        execute("tailwind.exe -i public/css/input.css -o public/css/output.css --watch");
    },
    "listen" => function () {
        execute("php -S localhost:5173");
    },
    "migration" => [
        "up" => function () use ($database) {

            $migrationPath = realpath(dirname(__FILE__) . "\\models\\migrations");
            $files = scandir($migrationPath);

            foreach ($files as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                require_once $migrationPath . "\\" . $file;
                $className = pathinfo($file, PATHINFO_FILENAME);
                $migration = new $className();
                echo "applying migration $file\n";

                $query = $migration->up($database->getConnection());

                if (!$query) {
                    echo "failed to apply migration $file\n";
                    $errMessage = sqlsrv_errors();

                    foreach ($errMessage as $message) {
                        echo $message["message"] . "\n";
                    }

                    echo "\n";
                } else {
                    echo "applied migration $file\n";
                }

            }
        },

        "down" => function () {
            down();
        }
    ]
];

function execute($command): void
{
    exec($command, $output, $status);

    if ($status !== 0) {
        echo "Error executing command: $command\n";
    }
}


//// run commands
$args = explode(":", $argv[1]);

if (!isset($argv[1]) || !isset($args[0])) {
    printf("Invalid Command");
    die(0);
}

if (!array_key_exists($args[0], $commands) || !array_key_exists($args[1], $commands[$args[0]])) {
    printf("Command not found");
    die(0);
}

if (isset($args[1])) {
    $commands[$args[0]][$args[1]]();
    return;
}

$commands[$args[0]]();
