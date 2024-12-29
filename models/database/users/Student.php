<?php

namespace app\models\database\users;

use app\constant\ValidationState;
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

    public static function getValidatedStudentsData(): array
    {
        return self::construct()
            ->select("*")
            ->from("student_data_view")
            ->where("validation_state", "?")
            ->bindParams(1, ValidationState::VALID)
            ->fetch();
    }

    public static function getStudentPrestasiData(string $prestasiId)
    {
        return self::construct()->query(
            "SELECT
            pt.name AS student_name,
            pt.role AS student_role,
            m.major_name,
            sp.study_program_name,
            p.competition_name,
            p.competition_level,
            p.place,
            p.date_start_competition,
            p.date_end_competition,
            p.competition_source,
            p.total_college_attended,
            p.total_participant,
            l.name AS supervisor_name,
            loa.[date] AS loa_date,
            loa.loa_number,
            a.certificate_path,
            a.documentation_photo_path,
            loa.loa_pdf_path,
            a.poster_path
        FROM prestasi_team AS pt
            JOIN prestasi AS p ON p.id = pt.prestasi_id
            JOIN student AS s ON s.nim = pt.nim
            JOIN major AS m ON s.major_id = m.id
            JOIN study_program AS sp ON sp.id = s.study_program_id
            JOIN lecturer AS l ON p.supervisor_id = l.nidn
            JOIN attachment AS a ON a.id = p.attachment_id
            JOIN loa AS loa ON loa.id = a.loa_id
        WHERE pt.prestasi_id = ?;"
        )->bindParams(1, $prestasiId)
            ->fetch();
    }
}