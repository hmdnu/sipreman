<?php

namespace app\models\database\users;

use app\models\BaseModel;

class Lecturer extends BaseModel
{
    public const string TABLE = "lecturer";
    public const string NIDN = "nidn";
    public const string NAME = "name";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values([
                self::NIDN => "?",
                self::NAME => "?"
            ])
            ->bindParams(1, $data[self::NIDN])
            ->bindParams(2, $data[self::NAME])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()
            ->delete(self::TABLE)
            ->execute();
    }

    public static function findAll(): array
    {
        return self::construct()
            ->select(self::NIDN, self::NAME)
            ->from(self::TABLE)
            ->fetch();
    }
}