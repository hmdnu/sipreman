<?php


use app\cores\dbal\ddl\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_011ProvinceChampMigration extends BaseMigration  implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("province_champ", function (Column $table) {
            $table->string("id")->primary();
            $table->string("nim");
        })->execute();
    }

    public function down(): bool
    {
        return Schema::dropTableIfExist("province_champ");
    }
}
