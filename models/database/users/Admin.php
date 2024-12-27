<?php

namespace app\models\database\users;

use app\models\BaseModel;

class Admin extends BaseModel
{
    public const TABLE = "admin";
    public const NIP = "nip";
    public const NAME = "name";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::NIP => "?",
                    self::NAME => "?"
                ]
            )
            ->bindParams(1, $data[self::NIP])
            ->bindParams(2, $data[self::NAME])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()
            ->delete(self::TABLE)
            ->execute();
    }

    public static function findOne(string $nip): ?array
    {

        return self::construct()
            ->select(self::NIP, self::NAME)
            ->from(self::TABLE)
            ->where(self::NIP, "?")
            ->bindParams(1, $nip)
            ->fetch();
    }
}