<?php

namespace app\core;

class Response
{

    public function setStatusCode(int $code, string $reasonPhrase = "")
    {

        http_response_code($code);
    }
}