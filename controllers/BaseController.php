<?php

namespace app\controllers;

use app\cores\Request;
use app\cores\Response;
use app\cores\View;

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