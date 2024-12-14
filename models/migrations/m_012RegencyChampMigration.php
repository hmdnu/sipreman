<?php

use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_012RegencyChampMigration extends BaseMigration  implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("regency_champ", function (Column $table) {
            $table->string("id")->primary();
            $table->string("nim");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("regency_champ")->execute();
    }
}
