<?php



use app\cores\Blueprint;
use app\cores\dbal\Column;
use app\cores\Schema;
use app\models\BaseMigration;
use app\models\Migration;

class m_013SkkmMigration extends BaseMigration  implements Migration
{
    public function up(): bool
    {
        return $this->construct->createTable("skkm", function (Column $table) {
            $table->string("id")->primary();
            $table->string("nim");
            $table->string("prestasi_id");
            $table->string("certificate_number");
            $table->string("level"); // level of championship
            $table->string("certificate_path");
            $table->decimal("point");
        })->execute();
    }

    public function down(): bool
    {
        return $this->construct->dropTable("skkm")->execute();
    }
}
