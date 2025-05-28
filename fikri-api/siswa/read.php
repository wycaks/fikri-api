<?php
require '../config/database.php';

$stmt = $pdo->query("SELECT * FROM siswa");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>