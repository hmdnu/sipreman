<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\View;

class BaseController
{
    protected Request $request;
    protected Response $response;
    private View $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View();
    }

    protected function view(string $viewPath, array $data = []): void
    {
        $this->view->render($viewPath, $data);
    }
}