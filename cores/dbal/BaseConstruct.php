<?php

namespace app\cores\dbal;

use app\constant\Config;
use app\cores\Database;

abstract class BaseConstruct
{
    abstract public function execute();

    public function executeSql(string $sql, array $params = []): ?array
    {
        var_dump($sql);
        return null;
//        $db = new Database(Config::getConfig());
//        $conn = $db::getConnection();
//
//        $prepare = $conn->prepare($sql);
//
//        foreach ($params as $key => $value) {
//            $prepare->bindValue($key, $value);
//        }
//
//       $exec =  $prepare->execute();
//
//        if (!$exec) {
//            return $prepare->errorInfo();
//        }
//
//        if (preg_match('/^\s*(SELECT|SHOW|DESCRIBE|EXPLAIN)/i', $sql)) {
//            return $prepare->fetchAll(\PDO::FETCH_ASSOC)[0];
//        }
//
//        return null;
    }
}
