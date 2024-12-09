<?php

namespace app\models\database\users;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Lecturer extends BaseModel
{
    public const TABLE = "lecturer";
    public const NIDN = "nidn";
    public const NAME = "name";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::NIDN, self::NAME], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function findAll(): array
    {
        $lecturers = [];

        $results = Schema::selectFrom(self::TABLE, function (Blueprint $table) {
            $table->select([self::NAME]);
        });

        if (isset($results["errors"])) {
            throw $results["errors"];
        }

        foreach ($results["result"] as $key => $value) {
            $lecturers[$key] = $value;
        }

        return $lecturers;
    }
}