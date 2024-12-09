<?php

namespace app\models\database\championLevel;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class InternationalChamp extends BaseModel
{
    public const TABLE = "international_champ";
    public const ID = "id";
    public const NIM = "nim";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::ID, self::NIM], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }


}