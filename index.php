<?php

use app\controllers\Auth;
use app\controllers\Home;
use app\core\Database;
use app\core\Router;

require_once "helpers/env.php";
require_once "vendor/autoload.php";

$config = [
    "serverName" => getenv("SERVER_NAME"),
    "connection" => [
        "database" => getenv("DB_NAME"),
        "uid" => getenv("UID"),
        "PWD" => getenv("PWD")
    ]
];

$db = new Database($config);
$db->connect();

$app = new Router();

$app::get("/", [Home::class, "index"]);
$app::get("/login", [Auth::class, "renderLogin"]);
$app::post("/post-login", [Auth::class, "login"]);

$app::run();
