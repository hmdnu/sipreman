<?php

namespace app\cores\dbal;

class Query extends BaseConstruct
{
    private string $sql;

    public function __construct(string $sql)
    {
        $this->sql = $sql;
    }

    public function execute(): ?array
    {
        return $this->executeSql($this->sql);
    }
}