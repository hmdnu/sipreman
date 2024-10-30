<?php

namespace app\controllers;

use app\core\BaseController;

class SiteController extends BaseController
{
    public function home()
    {
        return $this->render("home");
    }
}