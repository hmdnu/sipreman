<?php

use app\cores\dbal\Construct;

require_once "vendor/autoload.php";
require_once "./models/migrations/m_030StudentsDataView.php";

$construct = new Construct();

$class = new m_030StudentsDataView();

$class->up();