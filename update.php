<?php
include 'db.php';

$stmt = $pdo->prepare("UPDATE region SET name = '{$_POST['name']}' WHERE id = '{$_POST['id']}'");
$stmt->execute();