<?php



use app\cores\Blueprint;
use app\cores\Schema;
use app\models\Migration;

class m_005LoaMigration implements Migration
{
    public function up(): array
    {

        return Schema::createTableIfNotExist("loa", function (Blueprint $table) {
            $table->string("id");
            $table->string("loa_number");
            $table->date("date");
            $table->string("loa_pdf_path");

            $table->primary("id");
            $table->unique("loa_number");
        });
    }

    public function down(): array
    {
        return Schema::dropTableIfExist("loa");
    }
}