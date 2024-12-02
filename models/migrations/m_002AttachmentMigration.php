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
        $query = [];

        $query[0] = Schema::alterTable("prestasi", function (Blueprint $table) {
            $table->alterDropConstraint("FK_prestasi_id");
        });
        $query[1] = Schema::dropTableIfExist("attachment");

        return $query;
    }

}