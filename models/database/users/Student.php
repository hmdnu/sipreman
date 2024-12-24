<?php

namespace app\models\database\users;

use app\models\BaseModel;

class Student extends BaseModel
{
    public const string TABLE = "student";
    public const string NIM = "nim";
    public const string NAME = "name";
    public const string STUDY_PROGRAM_ID = "study_program_id";
    public const string MAJOR_ID = "major_id";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::NIM => "?",
                    self::NAME => "?",
                    self::STUDY_PROGRAM_ID => "?",
                    self::MAJOR_ID => "?"
                ]
            )
            ->bindParams(1, $data[self::NIM])
            ->bindParams(2, $data[self::NAME])
            ->bindParams(3, $data[self::STUDY_PROGRAM_ID])
            ->bindParams(4, $data[self::MAJOR_ID])
            ->execute();

    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }

    public static function findOne(string $nim): array
    {
        return self::construct()
            ->select(self::NIM, self::NAME)
            ->from(self::TABLE)
            ->where(self::NIM, "?")
            ->bindParams(1, $nim)
            ->fetch()[0];
    }
}