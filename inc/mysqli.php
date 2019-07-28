<?php

function connect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'db_smarthome';
    $charset = 'utf8';

    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $host, $name, $charset);

    try {
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $pdo;
}