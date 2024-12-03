<?php

namespace app\models\database\users;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class User extends BaseModel
{
    public const TABLE = "user";
    public const NO_INDUK = "no_induk";
    public const PASSWORD = "password";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::NO_INDUK, self::PASSWORD], $data);
        });
    }

    public static function findOne(string $noInduk, string $password)
    {

    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}