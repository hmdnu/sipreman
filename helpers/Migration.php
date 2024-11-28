<?php

namespace app\helpers;

require_once "vendor/autoload.php";
require_once "helpers/env.php";

use app\core\Database;

class Migration
{
    private Database $database;

    public function __construct(array $config)
    {
        $this->database = new Database($config);
        $this->database->connect();
    }

    public function migrate(): void
    {
        $migrationPath = realpath(__DIR__ . '/../models/migrations');
        $files = scandir($migrationPath);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            require_once $migrationPath . "/" . $file;
            $className = pathinfo($file, PATHINFO_FILENAME);
            $migration = new $className();

            echo "applying migration $file\n";
            $query = $migration->up($this->database->getConnection());

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
    }

    public function rollback()
    {
    }
}