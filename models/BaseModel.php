<?php

namespace app\models;

use app\cores\dbal\Construct;

abstract class BaseModel
{
    protected static function construct(): Construct
    {
        return new Construct();
    }

    abstract public static function insert(array $data): bool;

    abstract public static function deleteAll(): bool;
}
