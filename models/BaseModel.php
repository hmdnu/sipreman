<?php

namespace app\models;

use app\cores\Database;
use app\cores\Schema;

abstract class BaseModel
{
    protected static Schema $schema;

    public function __construct()
    {
        self::$schema = new Schema();
    }

    abstract public static function insert(array $data): array;
    abstract public static function deleteAll(): array;
}