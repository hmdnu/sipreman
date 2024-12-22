<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_005LoaMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->createTable("loa", function (Column $table) {
            $table->string("id")->primary();
            $table->string("loa_number")->unique();
            $table->date("date");
            $table->string("loa_pdf_path");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("loa")->execute();
    }
}
