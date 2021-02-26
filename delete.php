<?php
include 'db.php';

$stmt = $pdo->prepare("DELETE FROM region WHERE id = {$_POST['id']}");
$stmt->execute();
