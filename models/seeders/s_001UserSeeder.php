<?php

use app\models\BaseSeeder;
use app\models\database\users\User;

class s_001UserSeeder implements BaseSeeder
{
    public function create(): array
    {
        $noInduk = ["210010001", "210010002", "210010003", "210010004", "192345601", "192345602", "192345603", "192345604", "100321101", "100321102", "100321103", "100321104"];
        $password = ["mahasiswa1", "mahasiswa2", "mahasiswa3", "mahasiswa4", "dosen1", "dosen2", "dosen3", "dosen4", "admin1", "admin2", "admin3", "admin4"];
        $role = [
            "mahasiswa", "mahasiswa", "mahasiswa", "mahasiswa",
            "dosen", "dosen", "dosen", "dosen",
            "admin", "admin", "admin", "admin"
        ];

        $res = [];

        for ($i = 0; $i < count($noInduk); $i++) {
            $res[$i] = User::insert([
                "no_induk" => $noInduk[$i],
                "role" => $role[$i],
                "password" => password_hash($password[$i], PASSWORD_BCRYPT)]);
        }

        return $res;
    }

    public function delete(): array
    {
        return User::deleteAll();
    }
}