<?php


use app\models\BaseMigration;
use app\models\prestasiCore\Attachment;

class AttachmentMigration extends BaseMigration
{
    public function up($db)
    {
        $table = Attachment::$table;
        $id = Attachment::$id;
        $loaId = Attachment::$loaId;
        $certificationPath = Attachment::$certificatePath;
        $documentationPath = Attachment::$documentationPhotoPath;
        $posterPath = Attachment::$posterPath;
        $creationPath = Attachment::$creationPath;
        $caption = Attachment::$caption;

        $tsql = "
            IF NOT EXISTS (
            SELECT *
            FROM sysobjects
            WHERE name = '$table' AND xtype = 'U')
        BEGIN
            CREATE TABLE $table (
                [$id] nvarchar NOT PRIMARY KEY,
                [$loaId] nvarchar,
                [$certificationPath] nvarchar,
                [$documentationPath] nvarchar,
                [$creationPath] nvarchar,
                [$posterPath] nvarchar,
                [$caption] nvarchar,
            )
        END;";

        return sqlsrv_query($db, $tsql);
    }

    public function down($db)
    {
        $table = Attachment::$table;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return sqlsrv_query($db, $tsql);
    }

}