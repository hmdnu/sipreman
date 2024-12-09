<?php

namespace app\models\database\users;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Admin extends BaseModel
{
    public const TABLE = "admin";
    public const NIP = "nip";
    public const NAME = "name";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([self::NIP, self::NAME], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }

    public static function findOne(string $nip): array
    {

        $results =  Schema::selectWhereFrom(self::TABLE, function (Blueprint $table) use ($nip) {
            $table->selectWhere(["nip" => $nip], [self::NIP]);
        });

        if (isset($results["errors"])) {
            throw $results["errors"];
        }

        return $results["result"][0];
    }
}