<?php

namespace app\core;

interface Migration
{
    public function up(): void;

    public function down(): void;

}