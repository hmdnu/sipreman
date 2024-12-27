<?php

namespace app\models\database;

use app\models\BaseModel;

class Major extends BaseModel
{
    public const TABLE = "major";
    public const ID = "id";
    public const MAJOR_NAME = "major_name";
    public const TOTAL_VICTORY_MAJOR = "total_victory_major";


    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::MAJOR_NAME => "?",
                    self::TOTAL_VICTORY_MAJOR => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::MAJOR_NAME])
            ->bindParams(3, $data[self::TOTAL_VICTORY_MAJOR])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }

    public static function findAll(): array
    {
        return self::construct()
            ->select(self::ID, self::MAJOR_NAME, self::TOTAL_VICTORY_MAJOR)
            ->from(self::TABLE)
            ->fetch();
    }

    public static function find() {}
}