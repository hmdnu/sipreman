<?php

namespace app\cores\dbal\dml;

use app\cores\dbal\BaseConstruct;
use app\cores\dbal\DML;

class Deletion extends BaseConstruct implements DML
{
    private string $sql = "";
    private array $params = [];
    private string $tableName;
    private ?string $aliasName;

    public function __construct(string $tableName, string $aliasName = null)
    {
        $this->tableName = $tableName;
        $this->aliasName = $aliasName;
        $this->sql = "DELETE FROM [$this->tableName];";
    }

    public function where(string $column, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "WHERE $column $operator $value;";
        return $this;
    }

    public function and(string $column, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "AND $column $operator $value;";
        return $this;
    }

    public function or(string $column, string $value, string $operator = "="): self
    {
        $this->sql = str_replace(";", " ", $this->sql) . "OR $column $operator $value;";
        return $this;
    }

    function bindParams(int|string $params, mixed $value): self
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