<?php

namespace app\cores;

class View
{
    private static string $title = "PBL";

    public function render(string $viewPath, array $data = []): void
    {
        self::setTitle($data["title"]);
        require_once "./views/layouts/header.php";
        require_once "./views/{$viewPath}.php";
        require_once "./views/layouts/footer.php";
    }

    public static function getTitle(): string
    {
        return self::$title;
    }

    private static function setTitle(string $title): void
    {
        self::$title = $title;
    }

    public function renderException(string $viewPath, array $data = []): void
    {
        self::setTitle($data["title"]);
        require_once "./views/layouts/header.php";
        require_once "./views/exceptions/{$viewPath}.php";
        require_once "./views/layouts/footer.php";

    }
}