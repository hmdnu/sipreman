<?php

namespace app\cores;

class View
{
    private static string $title = "Sipreman";
    private static array $data = [];
    private static array $props = [];

    public function render(string $viewPath, string $title, array $data = []): void
    {
        self::$title = $title;
        self::$data = $data;
        require_once "./views/layouts/header.php";
        require_once "./views/{$viewPath}.php";
        require_once "./views/layouts/footer.php";
    }

    public static function renderComponent(string $componentPath, array $props = []): void
    {
        self::$props = $props;
        require_once "./views/components/{$componentPath}.php";
    }
    
    public static function getTitle(): string
    {
        return self::$title;
    }

    public static function getData(): array
    {
        return self::$data;
    }

    public static function getProps(): array
    {
        return self::$props;
    }

    public function renderException(string $viewPath, string $title, array $data = []): void
    {
        self::$title = $title;
        self::$data = $data;
        require_once "./views/layouts/header.php";
        require_once "./views/exceptions/{$viewPath}.php";
        require_once "./views/layouts/footer.php";

    }
}