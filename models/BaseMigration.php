<?php

namespace app\models;

abstract class BaseMigration
{
    abstract public function up($db);

    abstract public function down($db);

}