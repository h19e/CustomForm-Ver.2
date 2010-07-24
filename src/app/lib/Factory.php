<?php

class Factory
{
    static public function pdo()
    {
        $pdo = new PDO("mysql:host=" . DB_HOST ."; dbname=" . DB_NAME,DB_USER,DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_TO_STRING);
        return $pdo;
    }
}
