<?php

namespace app\cores;

class Seeder
{
    public function create(): void
    {
        $seederPath = realpath(__DIR__ . "/../models/seeders");
        $files = scandir($seederPath);

        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }

            require_once $seederPath . "/" . $file;
            $className = pathinfo($file, PATHINFO_FILENAME);
            $seeder = new $className();

            echo "inserting table " . $className . "\n";
            $query = $seeder->create();

            if (!$query) {
                echo "failed applying seeder $file\n";
                return;
            }

            echo "seeder applied\n";
        }
    }


    public function delete(): void
    {
        $seederPath = realpath(__DIR__ . "/../models/seeders");
        $files = scandir($seederPath);

        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }

            require_once $seederPath . "/" . $file;
            $className = pathinfo($file, PATHINFO_FILENAME);
            $seeder = new $className();

            echo "deleting columns " . $className . "\n";
            $query = $seeder->delete();

            if (isset($query["errors"])) {
                echo "failed to delete columns " . $className . "\n";
                $errMessages = $query["errors"];

                foreach ($errMessages as $errMessage) {
                    echo $errMessage . "\n";
                }

                echo "\n";
                return;
            } else {
                echo "columns {$className} deleted.\n";
            }
        }
    }
}