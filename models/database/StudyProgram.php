<?php

namespace app\models\database;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class StudyProgram extends BaseModel
{
    public const TABLE = "study_program";
    public const ID = "id";
    public const STUDY_PROGRAM_NAME = "study_program_name";
    public const MAJOR_ID = "major_id";
    public const TOTAL_VICTORY_STUDY_PROGRAM = "total_victory_study_program";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::ID, self::STUDY_PROGRAM_NAME, self::MAJOR_ID, self::TOTAL_VICTORY_STUDY_PROGRAM], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function findAll(): array
    {
        $studyProgram = [];

        $results = Schema::selectFrom(self::TABLE, function (Blueprint $table) {
            $table->select([self::STUDY_PROGRAM_NAME]);
        });

        if (isset($results["errors"])) {
            throw $results["errors"];
        }

        foreach ($results["result"] as $key => $value) {
            $studyProgram[$key] = $value[self::STUDY_PROGRAM_NAME];
        }

        return $studyProgram;
    }
}