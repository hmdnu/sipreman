<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;

class View extends BaseConstruct
{
    private string $sql;

    public function __construct(string $viewName)
    {
        $this->sql = "IF NOT EXISTS (
            SELECT 1
            FROM sys.views
            WHERE name = '$viewName'
        ) 
        BEGIN
            EXEC sp_executesql N'
            CREATE VIEW $viewName AS ";
    }

    public function as(string $sql): self
    {
        $this->sql .= "$sql' END;";

        return $this;
    }


    public function execute(): bool
    {
        return $this->executeSql($this->sql);
    }
}
