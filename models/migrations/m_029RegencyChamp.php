<?php

use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_029RegencyChamp extends BaseMigration implements Migration
{

    public function up(): bool
    {
        return $this->construct->alterTable("regency_champ", function (Column $table) {
            $table
                ->addForeignKey("nim", "fk_nim_regency_champ")
                ->reference("student", "nim")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
