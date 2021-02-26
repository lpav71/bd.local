<?php
include '../db.php';

$stmt = $pdo->prepare("INSERT INTO locality(region_id,name) VALUES (:region_id,:name)");
$stmt->bindParam(':region_id', $_POST['id']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->execute();
echo $_POST['id'];