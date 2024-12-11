<?php

namespace app\cores;

require_once "vendor/autoload.php";
require_once "helpers/env.php";

class Migration
{
    public function migrate(): void
    {
        $migrationPath = realpath(__DIR__ . "/../models/migrations");
        $files = scandir($migrationPath);
        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }

            require_once $migrationPath . "/" . $file;
            $className = pathinfo($file, PATHINFO_FILENAME);
            $migration = new $className();

            echo "applying migration $file\n";
            $query = $migration->up();

            if (!$query) {
                echo "failed applying migration $file\n";
                return;
            }

            echo "migration applied\n";
        }
    }

    public function rollback(): void
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

            echo "rollback migration $file\n";
            $query = $migration->down();

            if (!$query) {
                echo "failed rollback migration $file\n";
                return;
            }
            echo "rollback applied\n";
        }
    }
}