<?php

use app\cores\dbal\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_004LecturerMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("lecturer", function (Column $table) {
            $table->string("nidn")->primary();
            $table->string("name");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("lecturer")->execute();
    }
}
