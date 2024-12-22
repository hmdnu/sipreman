<?php

namespace app\models\database\prestasiCore;

use app\models\BaseModel;

class PrestasiStats extends BaseModel
{
    public const string TABLE = "prestasi_statistic";
    public const string ID = "id";
    public const string MAJOR_ID = "major_id";
    public const string STUDY_PROGRAM_ID = "study_program_id";
    public const string TOTAL_VICTORY_ALL = "total_victory_all";
    public const string YEAR = "year";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::MAJOR_ID => "?",
                    self::STUDY_PROGRAM_ID => "?",
                    self::TOTAL_VICTORY_ALL => "?",
                    self::YEAR => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::MAJOR_ID])
            ->bindParams(3, $data[self::STUDY_PROGRAM_ID])
            ->bindParams(4, $data[self::TOTAL_VICTORY_ALL])
            ->bindParams(5, $data[self::YEAR])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();    }
}