<?php
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $stmt = $pdo->prepare("DELETE FROM siswa WHERE id = :id");
    $stmt->bindParam(':id' $data->id);
       
        if ($stmt->execute() ) {
            echo json_encode(['message' => 'Siswa berhasil diperbarui']);
        } else {
                echo json_encode(['error' => 'Gagal memperbarui siswa, Karena ID tidak ada']);
        }
} else {
    echo json_encode(['error' => 'ID tidak ditemukan']);
}
?>