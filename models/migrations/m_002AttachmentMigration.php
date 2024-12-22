<?php

use app\cores\dbal\ddl\Column;
use app\models\BaseMigration;
use app\models\Migration;

class m_002AttachmentMigration extends BaseMigration implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("attachment", function (Column $table) {
            $table->string("id")->primary();
            $table->string("loa_id");
            $table->string("certificate_path");
            $table->string("documentation_photo_path");
            $table->string("poster_path");
            $table->string("caption");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("attachment")->execute();
    }
}
