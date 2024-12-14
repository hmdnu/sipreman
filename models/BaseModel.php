<?php

namespace app\models;

use app\cores\dbal\Construct;

abstract class BaseModel
{
    protected static Construct $construct;

    public static function instantiate(): void
    {
        self::$construct = new Construct();
    }


    abstract public static function insert(array $data): array;
    abstract public static function deleteAll(): array;
}
