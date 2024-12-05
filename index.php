<?php

use app\controllers\Auth;
use app\controllers\Dashboard;
use app\controllers\Home;
use app\cores\Database;
use app\cores\Router;
use app\constant\Config;
use app\middlewares\AdminMiddleware;
use app\middlewares\StudentMiddleware;
use app\controllers\Prestasi;

require_once "helpers/env.php";
require_once "vendor/autoload.php";

$db = new Database(Config::getConfig());

$app = new Router();

$app::get("/", [Home::class, "index"]);

$app::get("/login", [Auth::class, "renderLogin"]);
$app::post("/post-login", [Auth::class, "login"]);

$app::get("/dashboard/mahasiswa/:nim", [Dashboard::class, "studentDashboard"], [StudentMiddleware::class]);
$app::get("/dashboard/admin/:nip", [Dashboard::class, "adminDashboard"], [AdminMiddleware::class]);

$app::post("/post-prestasi", [Prestasi::class, "postPrestasi"]);
$app::post("/logout", [Auth::class, "logout"]);

$app::run();