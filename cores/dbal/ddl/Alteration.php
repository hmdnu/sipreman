<?php

namespace app\cores\dbal\ddl;

class Alteration
{
    private array $columns = [];
    private string $columnName = "";

    public function addForeignKey(string $column, string $constraintName = null): self
    {
        $sql = isset($constraintName) ? "ADD CONSTRAINT $constraintName" : "";

        $this->columns[$column] = trim("$sql FOREIGN KEY ($column)");
        $this->columnName = $column;
        return $this;
    }

    public function reference(string $referencedTable, string $referencedCol): self
    {
        $this->columns[$this->columnName] .= " REFERENCES [$referencedTable] ($referencedCol)";

        return $this;
    }

    public function onUpdate(string $action): self
    {
        $this->columns[$this->columnName] .= strtoupper(" ON UPDATE $action");
        return $this;
    }

    public function onDelete(string $action): self
    {
        $this->columns[$this->columnName] .= strtoupper(" ON DELETE $action");
        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

}