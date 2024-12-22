<?php

use app\cores\dbal\Construct;
use app\cores\dbal\dml\Selection;

require_once "vendor/autoload.php";

$construct = new Construct();

$res = $construct->query("SELECT * FROm [user] WHERE role = ?")
    ->bindParams(1, "student")
    ->fetch();
var_dump($res);

//$construct->update("user")->set("name", "kevin")->where("name", "ujang")->execute();
//
//$rs = $construct
//    ->select("*")
//    ->from("user", "u") // you can make alias
//    ->innerJoin("student", "s")
//    ->on("u.no_induk", "s.nim")
//    ->fetch();
//
////var_dump($rs);
//
//$construct
//    ->select("*")
//    ->from("user")
//    ->view("userView")
//    ->execute();
//
//$view = $construct->select("*")->from("userView")->fetch();
//
//var_dump($view);

//$construct->procedure("getMajor", function (Selection $selection) {
//    $selection
//        ->setColumns("id", "major_name")
//        ->from("major")
//        ->where("major_name", "@name");
//})->addParam("name", "nvarchar(10)")->execute();

//$res = $construct->call("getMajor", ["name" => "Akuntansi"])->fetch();

//$construct->procedure("getMajor")->drop()->execute();

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
