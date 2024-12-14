<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Prestasi extends BaseModel
{
    public const TABLE = "prestasi";
    public const ID = "id";
    public const COMPETITION_NAME = "competition_name";
    public const CATEGORY_NAME = "category_name";
    public const COMPETITION_LEVEL = "competition_level";
    public const PLACE = "place";
    public const DATE_START_COMPETITION = "date_start_competition";
    public const DATE_END_COMPETITION = "date_end_competition";
    public const COMPETITION_SOURCE = "competition_source"; // link to comp
    public const TOTAL_COLLEGE_ATTENDED = "total_college_attended";
    public const TOTAL_PARTICIPANT = "total_participant";
    public const IS_VALIDATE = "is_validate";
    public const ATTACHMENT_ID = "attachment_id";
    public const SUPERVISOR_ID = "supervisor_id";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::COMPETITION_NAME,
                self::CATEGORY_NAME,
                self::COMPETITION_LEVEL,
                self::PLACE,
                self::DATE_START_COMPETITION,
                self::DATE_END_COMPETITION,
                self::COMPETITION_SOURCE,
                self::TOTAL_COLLEGE_ATTENDED,
                self::TOTAL_PARTICIPANT,
                self::IS_VALIDATE,
                self::ATTACHMENT_ID,
                self::SUPERVISOR_ID
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function getPrestasiData(string $nim): array
    {
        self::instantiate();

        $query =
            "SELECT 
                    prestasi.competition_name,
                    loa.loa_number,
                    prestasi.competition_level,
                    prestasi_team.role,
                    skkm.point AS 'point',
                    prestasi.is_validate
                FROM prestasi_team
                    JOIN prestasi ON prestasi_team.prestasi_id = prestasi.id 
                    JOIN attachment ON prestasi.attachment_id = attachment.id
                    JOIN loa ON loa.id = attachment.loa_id
                    JOIN skkm on skkm.nim = prestasi_team.nim
                WHERE prestasi_team.nim = :nim;";

        return self::$construct->query($query)->bindParams(":nim", $nim)->execute()->fetchColumn();
    }
}
