<?php

namespace app\models\database\users;

use app\models\BaseModel;

class User extends BaseModel
{
    public const string TABLE = "user";
    public const string NO_INDUK = "no_induk";
    public const string ROLE = "role";
    public const string PASSWORD = "password";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values($data)
            ->execute();
    }

    public static function findOne(string $noInduk): array
    {
        return self::construct()
            ->select(self::NO_INDUK, self::ROLE, self::PASSWORD)
            ->from(self::TABLE)
            ->where(self::NO_INDUK, "?")
            ->bindParams(1, $noInduk)
            ->fetch()[0];
    }

    public static function findAll(): array
    {
        return self::construct()
            ->select(self::NO_INDUK, self::PASSWORD, self::ROLE)
            ->from(self::TABLE)
            ->fetch();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}
