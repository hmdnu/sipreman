<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_027NationalChamp extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->alterTable("national_champ", function (Column $table) {
            $table
                ->addForeignKey("nim", "fk_nim_national_champ")
                ->reference("student", "nim")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
