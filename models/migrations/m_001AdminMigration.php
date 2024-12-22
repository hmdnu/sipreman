<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_001AdminMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->create("admin", function (Column $col) {
            $col->string("nip")->primary();
            $col->string("name");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->drop("admin")->execute();
    }
}
