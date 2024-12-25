<?php

namespace app\models\database\championLevel;

use app\models\BaseModel;

class RegencyChamp extends BaseModel
{
    public const string TABLE = "regency_champ";
    public const string ID = "id";
    public const string NIM = "nim";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::NIM => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::NIM])
            ->execute();
    }

    public static function createInsertTrigger(): bool
    {
        return self::construct()->query(
            "CREATE TRIGGER insert_regency_champ ON prestasi_team
                AFTER INSERT AS
                 BEGIN
                    INSERT INTO regency_champ (id, nim)
                    SELECT
                        NEWID(),
                        nim
                    FROM INSERTED;
                 END;"
        )->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}
