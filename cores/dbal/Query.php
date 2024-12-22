<?php

namespace app\cores\dbal;

class Query extends BaseConstruct
{
    private string $sql;
    private array $params = [];

    public function __construct(string $sql)
    {
        $this->sql = $sql;
    }

    public function bindParams(string $params, string $value): self
    {
        $this->params[$params] = $value;
        return $this;
    }

    public function execute(): bool
    {
        return $this->executeSql($this->sql, $this->params);
    }

    public function fetch(): array
    {
        $res = $this->execute();

        if (!$res) {
            return [];
        }

        return $this->fetchColumn();
    }
}