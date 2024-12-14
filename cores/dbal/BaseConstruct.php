<?php

namespace app\cores\dbal;

use app\constant\Config;
use app\cores\Database;
use app\helpers\LogError;

abstract class BaseConstruct
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database(Config::getConfig());
    }

    public function execute(string $sql, array $params = []): bool
    {
        try {
            $prepare = $this->db::getConnection()->prepare($sql);

            foreach ($params as $param => $value) {
                $prepare->bindValue($param, $value, \PDO::PARAM_STR);
            }

            $exec = $prepare->execute();

            if (!$exec) {
                return false;
            }

            if (preg_match('/^\s*(SELECT|SHOW|DESCRIBE|EXPLAIN)/i', $this->sql)) {
                $this->columnResults[] = $prepare->fetchAll(\PDO::FETCH_ASSOC) ?: null;
            }

            return true;

        } catch (\PDOException $err) {
            LogError::log($err);
            return false;
        }
    }

    public function fetchColumn(): ?array
    {
        return $this->columnResults;
    }


}