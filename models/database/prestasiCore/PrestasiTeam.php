<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class PrestasiTeam extends BaseModel
{
    public const TABLE = "prestasi_team";
    public const ID = "id";
    public const IS_LEADER = "is_leader";
    public const IS_MEMBER = "is_member";
    public const SUPERVISOR_ID = "supervisor_id";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function(Blueprint $table) use ($data){
            $table->insert([self::ID, self::IS_LEADER, self::IS_MEMBER, self::SUPERVISOR_ID], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}