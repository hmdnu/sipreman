<?php

namespace app\core;

use app\core\Application;

class BaseController
{
    public string $layout = "base";

    public function render(string $pathToView, array $params = []): array|string
    {
        return Application::$app->router->renderView($pathToView, $params);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }
}