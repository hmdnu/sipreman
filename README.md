# Project Based Learning 
## Sistem Informasi Prestasi Mahasiswa

Note: this docs may be a bit missleading because im too lazy to edit it to new one, and this project is maybe 40% away of being complete and no i wont be finishing it. Feel free to contribute!!

Jurusan Teknologi Informasi, Prodi Sistem Informas Bisnis, Politeknik Negeri Malang.

## SQL Builder Guide

## Table of Contents
1. [DDL](#ddl)
2. [DML](#dml)
3. [Safely assign parameters](#safely-assign-parameters)
4. [Join](#join)
5. [View](#view)
6. [Procedure](#procedure)
7. [Raw query](#raw-query)

### DDL
```php
// Work in progress
```

### DML

```php
use app\cores\dbal\Construct;

$construct = new Construct();

// select statement
$result = $construct
    ->select("id", "name", "age")
    ->from("user")-
    >fetch(); // use fetch() to execute query and retrieve columns data
    
// SELECT id, name, age FROM [user];
```
```php
// insert statement
$construct
    ->insert("user")
    ->values([
        "id" => 123,
        "name" => "John Doe",
        "age" => 20
    ])
    ->execute() // use execute() to only execute query and return boolean

// INSERT INTO [user] (id, name, age) VALUES (123, 'John Doe', 20);
```
```php
// update statement
$construct 
    ->update("user")
    ->set("name", "kevin")
    ->where("name", "ujang")
    ->execute();
    
// UPDATE [user] SET name = 'kevin' WHERE name = 'ujang';
```

```php
// delete statement
$construct
    ->delete("user")
    ->where("id", 123)
    ->execute();

// DELETE FROM [user] WHERE id = 123;
```
---

### Safely Assign Parameters
you can safely assign parameters with bindParams() method to prevent sql injection

```php
$construct
    ->insert("user")
    ->values([
        "id" => "?",
        "name" => "?"
    ])
    ->bindParams(1, 123)
    ->bindParams(2, "kevin")
    ->execute();
    
// INSERT INTO [user] (id, name) VALUES (?, ?);

params {
 "id" => 123,
"name" => "kevin"
```
---
### Join
```php
$result = $construct
    ->select("id", "name")
    ->from("user", "u") // you can make alias
    ->innerJoin("student", "s")
    ->on("u.id", "s.id")
    ->fetch();
    
 // SELECT id, name FROM [user] AS u JOIN [student] AS s ON u.id = s.id;

// multiple join
$result = $construct
    ->select("id", "name")
    ->from("user", "u") // you can make alias
    ->innerJoin("student", "s")
    ->rightJoin("admin", "a")
    ->on("u.id", "s.id")
    ->on("u.id", "a.id")
    ->fetch();
    
```
---
### View
```php
// construct the view statement
$construct
    ->select("*")
    ->from("user")
    ->view("userView")
    ->execute();

// CREATE VIEW userView AS SELECT * FROM [user];

// query the view
$view = $construct->select("*")->from("userView")->fetch();
// SELECT * FROM [userView];
```
---
### Procedure
```php
// construct the procedure
$construct->procedure("getUser", function (Selection $selection) {
    $selection
        ->setColumns("id", "name")
        ->from("user")
        ->where("name", "@name");
})->addParam("name", "nvarchar(10)")->execute();

// exec the procedure
$res = $construct->call("getUser", ["name" => "ujang"])->fetch();
```
---
### Raw Query

```php
$res = $construct->query("SELECT * FROM [user] WHERE role = ?")
    ->bindParams(1, "student") // always recomend to use bindParams()
    ->fetch();
```
it works the same with the sql builder, you use fetch() if you want to return the column results


