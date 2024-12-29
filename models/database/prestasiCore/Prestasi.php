<?php

namespace app\models\database\prestasiCore;

use app\constant\Operators;
use app\constant\ValidationState;
use app\models\BaseModel;

class Prestasi extends BaseModel
{
    public const string TABLE = "prestasi";
    public const string ID = "id";
    public const string COMPETITION_NAME = "competition_name";
    public const string CATEGORY_NAME = "category_name";
    public const string COMPETITION_LEVEL = "competition_level";
    public const string PLACE = "place";
    public const string DATE_START_COMPETITION = "date_start_competition";
    public const string DATE_END_COMPETITION = "date_end_competition";
    public const string COMPETITION_SOURCE = "competition_source"; // link to comp
    public const string TOTAL_COLLEGE_ATTENDED = "total_college_attended";
    public const string TOTAL_PARTICIPANT = "total_participant";
    public const string VALIDATION_STATE = "validation_state";
    public const string ATTACHMENT_ID = "attachment_id";
    public const string SUPERVISOR_ID = "supervisor_id";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::COMPETITION_NAME => "?",
                    self::CATEGORY_NAME => "?",
                    self::COMPETITION_LEVEL => "?",
                    self::PLACE => "?",
                    self::DATE_START_COMPETITION => "?",
                    self::DATE_END_COMPETITION => "?",
                    self::COMPETITION_SOURCE => "?",
                    self::TOTAL_COLLEGE_ATTENDED => "?",
                    self::TOTAL_PARTICIPANT => "?",
                    self::VALIDATION_STATE => "?",
                    self::ATTACHMENT_ID => "?",
                    self::SUPERVISOR_ID => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::COMPETITION_NAME])
            ->bindParams(3, $data[self::CATEGORY_NAME])
            ->bindParams(4, $data[self::COMPETITION_LEVEL])
            ->bindParams(5, $data[self::PLACE])
            ->bindParams(6, $data[self::DATE_START_COMPETITION])
            ->bindParams(7, $data[self::DATE_END_COMPETITION])
            ->bindParams(8, $data[self::COMPETITION_SOURCE])
            ->bindParams(9, $data[self::TOTAL_COLLEGE_ATTENDED])
            ->bindParams(10, $data[self::TOTAL_PARTICIPANT])
            ->bindParams(11, $data[self::VALIDATION_STATE])
            ->bindParams(12, $data[self::ATTACHMENT_ID])
            ->bindParams(13, $data[self::SUPERVISOR_ID])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }

    public static function getPrestasiData(string $nim): array
    {
        return self::construct()
            ->select("*")
            ->distinct()
            ->from("prestasi_view")
            ->where("nim", "?")
            ->bindParams(1, $nim)
            ->fetch();
    }

    public static function getValidatedPrestasiData(string $nim): array
    {
        return self::construct()
            ->select("*")
            ->distinct()
            ->from("prestasi_view")
            ->where("nim", "?")
            ->and("validation_state", "?")
            ->bindParams(1, $nim)
            ->bindParams(2, ValidationState::VALID)
            ->fetch();
    }

    public static function getValidatingPrestasi()
    {
        return self::construct()
            ->select("*")
            ->from("student_data_view")
            ->where("validation_state", "?", "!=")
            ->and("role", "?")
            ->bindParams(1, "VALID")
            ->bindParams(2, "leader")
            ->fetch();
    }
}