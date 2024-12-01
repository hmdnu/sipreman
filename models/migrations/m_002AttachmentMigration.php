<?php

use app\cores\Blueprint;
use app\cores\Schema;
use app\models\BaseMigration;

class m_002AttachmentMigration implements BaseMigration
{
    public function up(): array
    {
        return Schema::createTableIfNotExist("attachment", function (Blueprint $table) {
            $table->string("id");
            $table->string("loa_id");
            $table->string("certification_path");
            $table->string("documentation_path");
            $table->string("poster_path");
            $table->string("creation_path");
            $table->string("caption");

            $table->primary("id");
            $table->unique("loa_id");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("attachment");
    }

}