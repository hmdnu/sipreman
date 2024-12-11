<?php

namespace app\helpers;

class Dump
{

    public static function out(...$var): void
    {
        echo "<pre>";
        foreach ($var as $v) {
            var_dump($v);
        }
        echo "</pre>";
    }
}