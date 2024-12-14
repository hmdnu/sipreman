<?php

use app\controllers\AuthController;
use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\cores\Database;
use app\cores\Router;
use app\constant\Config;
use app\middlewares\AdminMiddleware;
use app\middlewares\StudentMiddleware;
use app\controllers\PrestasiController;

require_once "helpers/env.php";
require_once "vendor/autoload.php";

$db = new Database(Config::getConfig());

$app = new Router();

$app::get("/", [HomeController::class, "index"]);
$app::get("/test", [HomeController::class, "testUpload"]);

$app::get("/login", [AuthController::class, "renderLogin"]);
$app::post("/post-login", [AuthController::class, "login"]);

// student routes
$app::get("/dashboard/student/:nim", [DashboardController::class, "studentUploadPrestasi"], [StudentMiddleware::class]);
$app::get("/dashboard/student/:nim/validation", [DashboardController::class, "studentValidation"], [StudentMiddleware::class]);
$app::get("/dashboard/student/:nim/point", [DashboardController::class, "studentPoint"], [StudentMiddleware::class]);

$app::post("/post-prestasi", [PrestasiController::class, "postPrestasi"]);

// admin routes
$app::get("/dashboard/admin/:nip", [DashboardController::class, "adminDashboard"], [AdminMiddleware::class]);
$app::get("/dashboard/admin/:nip/dataStudent", [DashboardController::class, "adminDataStudent"], [AdminMiddleware::class]);
$app::get("/dashboard/admin/:nip/validation", [DashboardController::class, "adminValidation"], [AdminMiddleware::class]);


$app::post("/logout", [AuthController::class, "logout"]);

$app::run();
