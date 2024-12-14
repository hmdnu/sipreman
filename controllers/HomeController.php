<?php

namespace app\controllers;

use app\cores\Schema;

class HomeController extends BaseController
{
    public function index(): void
    {
        $this->view("home/home", "home");
    }

    public function testUpload(): void
    {

        $this->view("testUpload", "test");
    }
}