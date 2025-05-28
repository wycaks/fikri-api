<?php
require_once('../config/database.php');

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->nama) && !empty($data->kelas)) {
    $query = "INSERT INTO siswa (nama, kelas) VALUES (:nama, :kelas)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nama", $data->nama);
    $stmt->bindParam(":kelas", $data->kelas);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Data siswa berhasil ditambahkan."]);
    } else {
        echo json_encode(["message" => "Gagal menambahkan data."]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap."]);
}
?>
