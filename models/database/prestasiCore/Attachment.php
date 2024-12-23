<?php

namespace app\models\database\prestasiCore;

use app\models\BaseModel;

class Attachment extends BaseModel
{
    public const string TABLE = "attachment";
    public const string ID = "id";
    public const string LOA_ID = "loa_id";
    public const string CERTIFICATE_PATH = "certificate_path";
    public const string DOCUMENTATION_PHOTO_PATH = "documentation_photo_path";
    public const string POSTER_PATH = "poster_path";
    public const string CAPTION = "caption";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::LOA_ID => "?",
                    self::CERTIFICATE_PATH => "?",
                    self::DOCUMENTATION_PHOTO_PATH => "?",
                    self::POSTER_PATH => "?",
                    self::CAPTION => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::LOA_ID])
            ->bindParams(3, $data[self::CERTIFICATE_PATH])
            ->bindParams(4, $data[self::DOCUMENTATION_PHOTO_PATH])
            ->bindParams(5, $data[self::POSTER_PATH])
            ->bindParams(6, $data[self::CAPTION])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}