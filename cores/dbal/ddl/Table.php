<?php

namespace app\cores\dbal\ddl;

use app\cores\dbal\BaseConstruct;

class Table extends BaseConstruct
{
    private array $params = [];
    private array $sql = [];
    private string $tableName;
    private array $columns;

    public function __construct(string $tableName, array $columns)
    {
        $this->tableName = $tableName;
        $this->columns = $columns;
    }

    public function buildCreate(): void
    {
        $columns = [];
        foreach ($this->columns as $key => $value) {
            $columns[] = "$key $value";
        }
        $columns = implode(", ", $columns);

        $this->sql[] = "IF NOT EXISTS (
                    SELECT *
                    FROM sysobjects
                    WHERE name = '{$this->tableName}' AND xtype = 'U'
                )
                BEGIN
                    CREATE TABLE [{$this->tableName}] (
                        $columns
                    )
                END;";
    }

    public function buildAlter(): void
    {
        foreach ($this->columns as $key => $value) {
            $this->sql[$key] = "ALTER TABLE [{$this->tableName}] $value";
        }
    }

    public function table(): self
    {
        $this->sql[] = "DROP TABLE IF EXISTS [{$this->tableName}]";
        return $this;
    }

    public function execute(): bool
    {
        foreach ($this->sql as $value) {
            $this->executeSql($value, $this->params);
        }

        return true;
    }
}