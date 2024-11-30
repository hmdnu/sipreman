<?php

namespace app\models;

interface BaseMigration
{
    public function up(): array;

    public function down(): array;

}