<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Skkm extends BaseModel
{
    public const TABLE = "skkm";
    public const ID = "id";
    public const NIM = "nim";
    public const PRESTASI_ID = "prestasi_id";
    public const CERTIFICATE_NUMBER = "certificate_number";
    public const LEVEL = "level";
    public const CERTIFICATE_PATH = "certificate_path";
    public const POINT = "point";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::NIM,
                self::PRESTASI_ID,
                self::CERTIFICATE_NUMBER,
                self::LEVEL,
                self::CERTIFICATE_PATH,
                self::POINT
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}