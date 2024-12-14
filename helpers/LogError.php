<?php

namespace app\helpers;


class LogError
{
 public static function log(\Throwable $msg): void
    {
        error_log($msg->getMessage());
    }
}