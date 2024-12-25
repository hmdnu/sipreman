<?php

namespace app\models\database\prestasiCore;

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
    public const string IS_VALIDATE = "is_validate";
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
                    self::IS_VALIDATE => "?",
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
            ->bindParams(11, $data[self::IS_VALIDATE])
            ->bindParams(12, $data[self::ATTACHMENT_ID])
            ->bindParams(13, $data[self::SUPERVISOR_ID])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }

    private static function createPrestasiView(): bool
    {
        return self::construct()->view("prestasi_view")->as(
            self::construct()
                ->select(
                    "prestasi_team.nim",
                    "prestasi.competition_name",
                    "loa.loa_number",
                    "prestasi.competition_level",
                    "prestasi_team.role",
                    "skkm.point",
                    "prestasi.is_validate"
                )
                ->from("prestasi_team", "pt")
                ->innerJoin("student", "s")->on("pt.nim", "s.nim")
                ->innerJoin("prestasi", "p")->on("pt.prestasi_id", "p.id")
                ->innerJoin("attachment", "a")->on("p.attachment_id", "a.id")
                ->innerJoin("loa", "l")->on("l.id", "a.loa_id")
                ->innerJoin("skkm", "s")->on("s.prestasi_id", "p.id")
                ->getSql()
        )->execute();
    }

    public static function getPrestasiData(string $nim): array
    {
        $view = self::createPrestasiView();

        if (!$view) {
            return [];
        };

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
            ->and("is_validate", "?")
            ->bindParams(1, $nim)
            ->bindParams(2, 1)
            ->fetch();
    }

    public static function createLoaAndAttachmentProcedure(): bool
    {
        return self::construct()->procedure("insert_loa_attachment")
            ->as(
                self::construct()
                    ->insert("loa")
                    ->values([
                        "id" => "@loa_id",
                        "date" => "@date",
                        "loa_number" => "@loa_number",
                        "loa_pdf_path" => "@loa_pdf_path"
                    ])->getSql()
                ,
                self::construct()
                    ->insert("attachment")
                    ->values([
                        "id" => "@attachment_id",
                        "loa_id" => "@attachment_loa_id",
                        "certificate_path" => "@certificate_path",
                        "documentation_photo_path" => "@docs_photo_path",
                        "poster_path" => "@poster_path",
                        "caption" => "@caption"
                    ])->getSql()
            )
            ->addParam("loa_id", "nvarchar(255)")
            ->addParam("date", "date")
            ->addParam("loa_number", "nvarchar(255)")
            ->addParam("loa_pdf_path", "nvarchar(255)")
            ->addParam("attachment_id", "nvarchar(255)")
            ->addParam("attachment_loa_id", "nvarchar(255)")
            ->addParam("certificate_path", "nvarchar(255)")
            ->addParam("docs_photo_path", "nvarchar(255)")
            ->addParam("poster_path", "nvarchar(255)")
            ->addParam("caption", "nvarchar(255)")
            ->execute();
    }

    public static function createPrestasiTeamSkkmProcedure(): bool
    {
        return self::construct()->procedure("insert_prestasi_team_skkm")
            ->as(
                self::construct()
                    ->insert("prestasi_team")
                    ->values([
                        "id" => "@pt_id",
                        "nim" => "@pt_nim",
                        "name" => "@name",
                        "role" => "@role",
                        "supervisor_id" => "@pt_supervisor_id",
                        "prestasi_id" => "@pt_prestasi_id",
                    ])->getSql(),

                self::construct()
                    ->insert("skkm")
                    ->values([
                        "id" => "@skkm_id",
                        "nim" => "@skkm_nim",
                        "prestasi_id" => "@skkm_prestasi_id",
                        "certificate_number" => "@certificate_number",
                        "level" => "@level",
                        "certificate_path" => "@certificate_path",
                        "point" => "@point"
                    ])
                    ->getSql()
            )
            ->addParam("pt_id", "nvarchar(255)")
            ->addParam("pt_nim", "nvarchar(255)")
            ->addParam("name", "nvarchar(255)")
            ->addParam("role", "nvarchar(255)")
            ->addParam("pt_supervisor_id", "nvarchar(255)")
            ->addParam("pt_prestasi_id", "nvarchar(255)")
            ->addParam("skkm_id", "nvarchar(255)")
            ->addParam("skkm_nim", "nvarchar(255)")
            ->addParam("skkm_prestasi_id", "nvarchar(255)")
            ->addParam("certificate_number", "nvarchar(255)")
            ->addParam("level", "nvarchar(255)")
            ->addParam("certificate_path", "nvarchar(255)")
            ->addParam("point", "decimal")
            ->execute();
    }
}
