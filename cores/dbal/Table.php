<?php

namespace app\cores\dbal;

class Table
{

    private string $tableName;
    private Column $column;

    public function __construct(string $tableName, Column $column)
    {
        $this->tableName = $tableName;
        $this->column = $column;
    }
}