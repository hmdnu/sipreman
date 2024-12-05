<?php

namespace app\controllers;

use app\controllers\BaseController;
use app\cores\Request;
use app\cores\Response;

class Prestasi extends BaseController
{

    public function postPrestasi(Request $req, Response $res): void
    {
        $body = $req->body();

        var_dump($body);
    }
}