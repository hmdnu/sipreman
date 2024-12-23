<?php

namespace app\models\database\prestasiCore;

use app\models\BaseModel;

class PrestasiTeam extends BaseModel
{
    public const string TABLE = "prestasi_team";
    public const string ID = "id";
    public const string ROLE = "role";
    public const string SUPERVISOR_ID = "supervisor_id";
    public const string NIM = "nim";
    public const string NAME = "name";
    public const string PRESTASI_ID = "prestasi_id";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::ROLE => "?",
                    self::SUPERVISOR_ID => "?",
                    self::NIM => "?",
                    self::NAME => "?",
                    self::PRESTASI_ID => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::ROLE])
            ->bindParams(3, $data[self::SUPERVISOR_ID])
            ->bindParams(4, $data[self::NIM])
            ->bindParams(5, $data[self::NAME])
            ->bindParams(6, $data[self::PRESTASI_ID])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}