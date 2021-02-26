<?php
include '../db.php';

$stmt = $pdo->prepare("DELETE FROM locality WHERE id = {$_POST['id']}");
$stmt->execute();
