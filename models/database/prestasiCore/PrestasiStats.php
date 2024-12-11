<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class PrestasiStats extends BaseModel
{
    public const TABLE = "prestasi_statistic";
    public const ID = "id";
    public const MAJOR_ID = "major_id";
    public const STUDY_PROGRAM_ID = "study_program_id";
    public const TOTAL_VICTORY_ALL = "total_victory_all";
    public const YEAR = "year";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::MAJOR_ID,
                self::STUDY_PROGRAM_ID,
                self::TOTAL_VICTORY_ALL,
                self::YEAR
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}