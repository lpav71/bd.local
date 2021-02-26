<?php
include 'db.php';

$stmt = $pdo->prepare("INSERT INTO region(name) VALUES (:name)");
$stmt->bindParam(':name', $_POST['name']);
$stmt->execute();

