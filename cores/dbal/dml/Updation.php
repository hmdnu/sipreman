<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;
use app\cores\dbal\DML;

class Updation extends BaseConstruct implements DML
{
    private string $tableName;
    private ?string $aliasName;
    private string $sql;
    private array $params = [];

    public function __construct(string $tableName, string $aliasName = null)
    {
        $this->tableName = $tableName;
        $this->aliasName = $aliasName;
    }

    public function set(string $column, string $value): self
    {
        $value = $this->handleString($value);
        $aliasName = $this->handleAlias($this->aliasName);
        $this->sql = trim("UPDATE [{$this->tableName}]$aliasName SET $column = $value;");
        return $this;
    }

    public function where(string $column, string $value, string $operator = "="): self
    {
        $value = $this->handleString($value);
        $this->sql = str_replace(";", "", $this->sql) . " WHERE $column $operator $value;";
        return $this;
    }

    private function handleAlias(?string $aliasName): string
    {
        return isset($aliasName) ? "AS $aliasName" : "";
    }

    private function handleString(mixed $value)
    {
        return is_string($value) ? $value === "?" ? "?" : "'$value'" : $value;
    }

    public function bindParams(int|string $params, mixed $value): self
    {
        $this->params[$params] = $value;
        return $this;
    }

    /**
     * return boolean, only execute the query
     * @return bool
     */
    public function execute(): bool
    {
        return $this->executeSql($this->sql, $this->params);
    }


    /**
     * execute query and return the columns
     * @return array
     */
    public function fetch(): array
    {
        $res = $this->execute();

        if (!$res) {
            return [];
        }

        return $this->fetchColumn();
    }
}