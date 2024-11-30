<?php

namespace app\cores;

class Response
{
    public function redirect(string $url): void
    {
        header('Location: ' . $url);
    }

    public function setStatusCode(int $code, string $message = ""): void
    {
        http_response_code($code);
    }
}