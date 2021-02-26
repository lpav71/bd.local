<?php
include '../db.php';

$stmt = $pdo->prepare("UPDATE locality SET name = '{$_POST['name']}', region_id = {$_POST['region_id']} WHERE id = '{$_POST['id']}'");
$stmt->execute();
