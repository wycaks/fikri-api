<?php
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->nama) && !empty($data->kelas)) {
    $stmt = $pdo->prepare("UPDATE siswa SET nama = ?, kelas = ? WHERE id = ?");
    if ($stmt->execute([$data->nama, $data->kelas, $data->id])) {
        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Siswa berhasil dihapus']);
        
            } else {
                echo json_encode(['error' => 'Gagal memperbarui siswa, Karena ID tidak ada']);
            }
        }
} else {
    echo json_encode(['error' => 'Params Salah']);
}
?>