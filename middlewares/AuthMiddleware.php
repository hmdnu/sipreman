<?php

namespace app\middlewares;

class AuthMiddleware implements Middleware
{
    public function before(): void
    {
        echo "executed";
    }
}