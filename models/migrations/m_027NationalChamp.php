<?php

use app\cores\dbal\ddl\Alteration;
use app\models\BaseMigration;
use app\models\Migration;

class m_027NationalChamp extends BaseMigration implements Migration
{
    public function up(): bool
    {

        return $this->construct->alter("national_champ", function (Alteration $table) {
            $table
                ->addForeignKey("nim", "fk_nim_national_champ")
                ->reference("student", "nim")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        })->execute();
    }

    public function down(): bool
    {
        return true;
    }
}
