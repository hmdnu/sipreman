<?php

require_once "vendor/autoload.php";
require_once "helpers/env.php";

function migrate(): array
{
    $migrations = [];
    // read all migration files
    $migrationPath = realpath(dirname(__FILE__) . '/../models/migrations');
    $files = scandir($migrationPath);

    // instantiate each class migration
    try {
        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }
            require_once $migrationPath . '/' . $file;
            $className = pathinfo($file, PATHINFO_FILENAME);
            $migrations[] = $className;
        }

    } catch (Exception $e) {
        var_dump($e);
    }

    return $migrations;
}

function down(): void
{

    // read all migration files
    $migrationPath = realpath(dirname(__FILE__) . '/../models/migrations/');
    $files = scandir($migrationPath);

// instantiate each class migration
    try {
        foreach ($files as $file) {
            if ($file !== "." && $file !== "..") {
                $className = pathinfo($file, PATHINFO_FILENAME);
                $instance = new $className();

                echo "rollback migration " . $file . "\n";
                $instance->down();
                echo "rollback applied " . $file . "\n";
            }
        }
    } catch (Exception $e) {
        var_dump($e);
    }
}
