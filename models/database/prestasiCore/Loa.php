<?php

namespace app\models\database\prestasiCore;

use app\models\BaseModel;

class Loa extends BaseModel
{
    public const string TABLE = "loa";
    public const string ID = "id";
    public const string DATE = "date";
    public const string LOA_NUMBER = "loa_number";
    public const string LOA_PDF_PATH = "loa_pdf_path";

    public static function insert(array $data): bool
    {
        return self::construct()
            ->insert(self::TABLE)
            ->values(
                [
                    self::ID => "?",
                    self::DATE => "?",
                    self::LOA_NUMBER => "?",
                    self::LOA_PDF_PATH => "?"
                ]
            )
            ->bindParams(1, $data[self::ID])
            ->bindParams(2, $data[self::DATE])
            ->bindParams(3, $data[self::LOA_NUMBER])
            ->bindParams(4, $data[self::LOA_PDF_PATH])
            ->execute();
    }

    public static function deleteAll(): bool
    {
        return self::construct()->delete(self::TABLE)->execute();
    }
}