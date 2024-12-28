<?php

namespace app\controllers;

use app\constant\Config;
use app\cores\Database;
use app\cores\View;

abstract class BaseController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function view(string $viewPath, string $title, array $data = []): void
    {
        $this->view->render($viewPath, $title, $data);
    }
}