<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class PrestasiTeam extends BaseModel
{
    public const TABLE = "prestasi_team";
    public const ID = "id";
    public const ROLE = "role";
    public const SUPERVISOR_ID = "supervisor_id";
    public const NIM = "nim";
    public const NAME = "name";
    public const PRESTASI_ID = "prestasi_id";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::NIM,
                self::NAME,
                self::ROLE,
                self::SUPERVISOR_ID,
                self::PRESTASI_ID
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}