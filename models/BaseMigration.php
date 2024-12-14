<?php

namespace app\models;

use app\constant\Config;
use app\cores\Database;
use app\cores\dbal\Construct;
use PDO;

abstract class BaseMigration
{
    protected Construct $construct;

    public function __construct(){
        $this->construct = new Construct();
    }
}