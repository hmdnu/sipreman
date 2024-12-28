<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;

class View extends BaseConstruct
{
    private string $sql = "";
    private string $viewName;

    public function __construct(string $viewName)
    {
        $this->viewName = $viewName;
    }

    private function buildView(): string
    {
        return "IF NOT EXISTS (
            SELECT 1
            FROM sys.views
            WHERE name = '$this->viewName'
        ) 
        BEGIN
            EXEC sp_executesql N'
            CREATE VIEW $this->viewName AS ";
    }

    public function as(string $sql): self
    {
        $sql = str_replace(";", "", $sql);

        $sql = preg_replace_callback(
            '/WHERE\s+([^\s]+)\s*=\s*\'([^\']+)\'/i',
            function ($matches) {
                $column = $matches[1];
                $value = str_replace("'", "''", $matches[2]);
                return "WHERE $column = ''$value''";
            },
            $sql
        );

        $this->sql .= "$sql;' END;";

        return $this;
    }


    public function drop(): self
    {

        $this->sql = "DROP VIEW $this->viewName;";

        return $this;
    }

    public function execute(): bool
    {
        if (preg_match('/^\s*(DROP)/i', $this->sql)) {
            return $this->executeSql($this->sql);
        }

        $sql = $this->buildView();
        $sql .= $this->sql;

        return $this->executeSql($sql);
    }
}
