<?php

namespace app\cores\dbal\ddl;

class Column
{
    private array $columns = [];
    private string $columnName = "";

    public function string(string $column, $length = 255): self
    {
        $this->columns[$column] = "NVARCHAR($length)";
        $this->columnName = $column;
        return $this;
    }

    public function int(string $column, int $length = 11): self
    {
        $this->columns[$column] = "INT($length)";
        $this->columnName = $column;
        return $this;
    }

    public function tinyInt(string $column): self
    {
        $this->columns[$column] = "TINYINT(1)";
        $this->columnName = $column;
        return $this;
    }

    public function decimal(string $column): self
    {
        $this->columns[$column] = "DECIMAL";
        $this->columnName = $column;
        return $this;
    }

    public function primary(): self
    {
        $this->columns[$this->columnName] .= " PRIMARY KEY";
        return $this;
    }

    public function unique(): self
    {
        $this->columns[$this->columnName] .= " UNIQUE";
        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

}