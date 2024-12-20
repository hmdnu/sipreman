<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;
use app\cores\dbal\DML;

class Selection extends BaseConstruct implements DML
{
    private string $columns = "";
    private string $sql = "";
    private array $params = [];


    public function __construct(string $columns)
    {
        $this->columns = $columns;
    }

    public function from(string $tableName, string $alias = null): self
    {
        $aliasTable = $this->handleAlias($alias);
        $this->sql = trim("SELECT {$this->columns} FROM [$tableName] $aliasTable") . ";";
        return $this;
    }

    public function where(string $field, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "WHERE $field $operator $value;";

        return $this;
    }

    public function and(string $field, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "AND $field $operator $value;";

        return $this;
    }

    public function or(string $field, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "OR $field $operator $value;";

        return $this;
    }

    public function innerJoin(string $referencedTable, string $alias = null): self
    {
        $aliasName = $this->handleAlias($alias);
        $this->sql = str_replace(";", " ", $this->sql) . "JOIN [$referencedTable] AS $aliasName";
        return $this;
    }

    public function rightJoin(string $referencedTable, string $alias = null): self
    {
        $aliasName = $this->handleAlias($alias);
        $this->sql = str_replace(";", " ", $this->sql) . "RIGHT JOIN [$referencedTable] AS $aliasName";
        return $this;
    }

    public function leftJoin(string $referencedTable, string $alias = null): self
    {
        $aliasName = $this->handleAlias($alias);
        $this->sql = str_replace(";", " ", $this->sql) . "LEFT JOIN [$referencedTable] AS $aliasName";
        return $this;
    }

    public function on(string $column1, string $column2): self
    {
        $this->sql = $this->sql . " ON $column1 = $column2;";

        return $this;
    }

    public function bindParams(string|int $params, mixed $value): self
    {
        $this->params[$params] = $value;

        return $this;
    }

    private function handleAlias(string|null $alias): string
    {
        return isset($alias) ? "AS $alias" : "";
    }

    public function execute(): ?array
    {
        return $this->executeSql($this->sql, $this->params);
    }
}
