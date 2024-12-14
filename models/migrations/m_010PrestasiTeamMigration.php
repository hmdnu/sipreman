<?php

use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_010PrestasiTeamMigration extends  BaseMigration  implements Migration
{
    public function up(): bool
    {

        return $this->construct->createTable("prestasi_team", function (Column $table) {
            $table->string("id")->primary();
            $table->string("nim");
            $table->string("name");
            $table->string("role");
            $table->string("supervisor_id");
            $table->string("prestasi_id");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("prestasi_team")->execute();
    }
}
