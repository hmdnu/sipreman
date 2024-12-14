<?php

namespace app\models;

interface Migration
{
    public function up(): bool;

    public function down(): bool;
}
