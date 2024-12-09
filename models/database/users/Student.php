<?php

namespace app\models\database\users;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Student extends BaseModel
{
    public const TABLE = "student";
    public const NIM = "nim";
    public const NAME = "name";
    public const STUDY_PROGRAM_ID = "study_program_id";
    public const MAJOR_ID = "major_id";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::NIM, self::NAME, self::STUDY_PROGRAM_ID, self::MAJOR_ID], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function findOne(string $nim): array
    {
        $student = Schema::selectWhereFrom(self::TABLE, function (Blueprint $table) use ($nim) {
            $table->selectWhere(["nim" => $nim], [self::NIM, self::NAME]);
        });

        if (isset($student["errors"])) {
            throw $student["errors"];
        }

        return $student["result"][0];
    }
}