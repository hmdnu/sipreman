<?php

namespace app\models\database\prestasiCore;

use app\models\BaseModel;

class Skkm extends BaseModel
{
    public const string TABLE = "skkm";
    public const string ID = "id";
    public const string NIM = "nim";
    public const string PRESTASI_ID = "prestasi_id";
    public const string CERTIFICATE_NUMBER = "certificate_number";
    public const string LEVEL = "level";
    public const string CERTIFICATE_PATH = "certificate_path";
    public const string POINT = "point";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::NIM => "?",
                    self::PRESTASI_ID => "?",
                    self::CERTIFICATE_NUMBER => "?",
                    self::LEVEL => "?",
                    self::CERTIFICATE_PATH => "?",
                    self::POINT => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::NIM])
            ->bindParams(3, $data[self::PRESTASI_ID])
            ->bindParams(4, $data[self::CERTIFICATE_NUMBER])
            ->bindParams(5, $data[self::LEVEL])
            ->bindParams(6, $data[self::CERTIFICATE_PATH])
            ->bindParams(7, $data[self::POINT])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}