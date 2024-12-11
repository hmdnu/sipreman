<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Attachment extends BaseModel
{
    public const TABLE = "attachment";
    public const ID = "id";
    public const LOA_ID = "loa_id";
    public const CERTIFICATE_PATH = "certificate_path";
    public const DOCUMENTATION_PHOTO_PATH = "documentation_photo_path";
    public const POSTER_PATH = "poster_path";
    public const CAPTION = "caption";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::LOA_ID,
                self::CERTIFICATE_PATH,
                self::DOCUMENTATION_PHOTO_PATH,
                self::POSTER_PATH,
                self::CAPTION
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}