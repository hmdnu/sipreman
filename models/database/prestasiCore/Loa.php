<?php

namespace app\models\database\prestasiCore;

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseModel;

class Loa extends BaseModel
{
    public const TABLE = "loa";
    public const ID = "id";
    public const DATE = "date";
    public const LOA_NUMBER = "loa_number";
    public const LOA_PDF_PATH = "loa_pdf_path";

    public static function insert(array $data): array
    {
        return Schema::insertInto(self::TABLE, function (Blueprint $table) use ($data) {
            $table->insert([
                self::ID,
                self::DATE,
                self::LOA_NUMBER,
                self::LOA_PDF_PATH
            ], $data);
        });
    }

    public static function deleteAll(): array
    {
        return Schema::deleteFrom(self::TABLE);
    }
}