<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_028ProvinceChamp extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alter("province_champ", function (Alteration $table) {
            $table
                ->addForeignKey("nim", "fk_nim_province_champ")
                ->reference("student","nim");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
