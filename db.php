<?php
$host = "localhost";
$port = 3306;
$user = "root";
$pass = "root";
$database = "bd";
$charset = 'utf8';

//$db = new PDO("mysql: host=$host; port=$port; charset=UTF8", $username, $password);
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);