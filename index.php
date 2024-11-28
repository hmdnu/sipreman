<?php

use app\controllers\Auth;
use app\controllers\Home;
use app\core\Database;
use app\core\Router;

require_once "helpers/env.php";
require_once "vendor/autoload.php";

use app\constant\Config;

$db = new Database(Config::getConfig());
$db->connect();

$app = new Router();

$app::get("/", [Home::class, "index"]);
$app::get("/login", [Auth::class, "renderLogin"]);
$app::post("/post-login", [Auth::class, "login"]);

$app::run();
