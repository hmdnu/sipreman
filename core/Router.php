<?php

namespace app\core;

use const app\constant\BASE_LAYOUT;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback): void
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, $callback): void
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve(): string
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            Application::$app->baseController = new $callback[0]();

            $callback[0] = Application::$app->baseController;
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView(string $pathToView, array $params = []): array|string
    {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($pathToView, $params);

        return str_replace("{{content}}", $viewContent, $layoutContent);
    }
    public function renderContent(string $viewContent)
    {

        $layoutContent = $this->layoutContent();
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    protected function layoutContent(): bool|string
    {
        $layout = Application::$app->baseController->layout ?? BASE_LAYOUT;

        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView(string $pathToView, array $params = []): bool|string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$pathToView.php";
        return ob_get_clean();
    }
}