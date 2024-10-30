<?php

namespace app\core;

class Request
{

    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");

        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function isGet(): string
    {
        return $this->getMethod() === "get";
    }

    public function isPost(): string
    {
        return $this->getMethod() === "post";
    }

    public function getBody()
    {
        $body = [];
        if ($this->getMethod() == "GET") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() == "POST") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}