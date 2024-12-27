<?php

namespace app\models\database;

use app\helpers\UUID;
use app\models\BaseModel;

class StudyProgram extends BaseModel
{
    public const TABLE = "study_program";
    public const ID = "id";
    public const STUDY_PROGRAM_NAME = "study_program_name";
    public const MAJOR_ID = "major_id";
    public const TOTAL_VICTORY_STUDY_PROGRAM = "total_victory_study_program";

    public static function insert(array $data): bool
    {

        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::STUDY_PROGRAM_NAME => "?",
                    self::MAJOR_ID => "?",
                    self::TOTAL_VICTORY_STUDY_PROGRAM => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::STUDY_PROGRAM_NAME])
            ->bindParams(3, $data[self::MAJOR_ID])
            ->bindParams(4, $data[self::TOTAL_VICTORY_STUDY_PROGRAM])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }

    public static function findAll(): array
    {
        return self::construct()
            ->select(self::STUDY_PROGRAM_NAME)
            ->from(self::TABLE)
            ->fetch();
    }
}