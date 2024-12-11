<?php

use app\models\BaseMigration;
use app\models\Migration;
use app\cores\dbal\Column;

class m_001AdminMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("admin", function (Column $table) {
            $table->string("nip")->primary();
            $table->string("name");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("admin")->execute();
    }
}
