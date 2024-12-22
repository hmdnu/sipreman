<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_026InternationalChamp extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->alterTable("international_champ", function (Column $table) {
            $table
                ->addForeignKey("nim", "fk_nim_international_champ")
                ->reference("student","nim")
                ->cascade();
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
