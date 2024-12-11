<?php

namespace app\models\database;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Major extends BaseModel
{
    public const TABLE = "major";
    public const ID = "id";
    public const MAJOR_NAME = "major_name";
    public const TOTAL_VICTORY_MAJOR = "total_victory_major";


    public static function insert(array $data): array
    {

         return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
             $table->insert([
                 self::ID,
                 self::MAJOR_NAME,
                 self::TOTAL_VICTORY_MAJOR
             ], $data);
         });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function findAll(): array
    {
        $majors = [];

        $results =  Schema::selectFrom(self::TABLE, function (Blueprint $table) {
            $table->select([self::MAJOR_NAME]);
        });

        if (isset($results["errors"])) {
            throw $results["errors"];
        }

        foreach ($results["result"] as $key => $major) {
            $majors[$key] = $major[self::MAJOR_NAME];
        }

        return $majors;
    }

    public static function find() {}
}