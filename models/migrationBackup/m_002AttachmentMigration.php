<?php

namespace app\models\migrationBackup;

use app\models\BaseMigration;
use app\models\prestasiCore\Attachment;

class m_002AttachmentMigration implements BaseMigration
{
    public function up($db)
    {
        $table = Attachment::TABLE;
        $id = Attachment::ID;
        $loaId = Attachment::LOA_ID;
        $certificationPath = Attachment::CERTIFICATE_PATH;
        $documentationPath = Attachment::DOCUMENTATION_PHOTO_PATH;
        $posterPath = Attachment::POSTER_PATH;
        $creationPath = Attachment::CREATION_PATH;
        $caption = Attachment::CAPTION;

        $tsql = "
            IF NOT EXISTS (
            SELECT *
            FROM sysobjects
            WHERE name = '$table' AND xtype = 'U')
        BEGIN
            CREATE TABLE $table (
                [$id] nvarchar PRIMARY KEY,
                [$loaId] nvarchar,
                [$certificationPath] nvarchar,
                [$documentationPath] nvarchar,
                [$creationPath] nvarchar,
                [$posterPath] nvarchar,
                [$caption] nvarchar,
            )
        END;";

        return $db->prepare($tsql);
    }

    public function down($db)
    {
        $table = Attachment::TABLE;
        $tsql = "DROP TABLE IF EXISTS $table;";
        return $db->prepare($tsql);
    }

}