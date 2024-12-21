<?php

use app\cores\dbal\Alteration;
use app\cores\dbal\Column;
use app\cores\dbal\Construct;

require_once "vendor/autoload.php";

$construct = new Construct();


$sql = $construct
    ->delete("major")
    ->where("major_name", "?")
    ->bindParams(1, "Sastra Dan Bahasa")
    ->execute();


$res = $construct
    ->select("*")
    ->from("major")
    ->fetch();

var_dump($sql, $res);



//$construct->create("user", function (Column $column) {
//    $column->string("id")->primary();
//    $column->string("name")->unique();
//    $column->string("class");
//    $column->int("age");
//
//})->execute();
//
//$construct->alter("user", function (Alteration $col) {
//    $col->addForeignKey("nim", "fk_nim")
//        ->reference("student", "nim");
//
//    $col->addForeignKey("id_class", "fk_id_class")
//        ->reference("class", "id")
//        ->onDelete("cascade")
//        ->onUpdate("cascade");
//
//})->execute();
//
//$construct->drop("user")->table()->execute();

//$res = $construct
//    ->update("user")
//    ->set("user", "?")
//    ->where("id", "?")
//    ->bindParams(1, "ini itu id")
//    ->execute();
//
