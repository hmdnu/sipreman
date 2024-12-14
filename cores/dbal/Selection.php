<?php

namespace app\cores\dbal;

class Selection
{
    private string $table = "";
    private string $sql = "";
    private string $query = "";
    private string $columns = "";
    
    public function from(string $tableName, string $alias = ""): self
    {
        $aliasParts = $alias ? "AS $alias" : "";
        $this->table = "$tableName$aliasParts";

        return $this;
    }

    public function where(string $field, string $operator, string $value)
    {
    }

    public function join(string $rightTable, string $condition): self
    {
        return $this;
    }

    public function get(): string
    {
        $sql = "SELECT $this->columns FROM [$this->table]";


        return $sql;
    }
}