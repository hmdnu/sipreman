<?php

namespace app\cores;

class Request
{

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUrl(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function body()
    {


    }

}