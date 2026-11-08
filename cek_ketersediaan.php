<?php
header('Content-Type: application/json');
include 'conn/config.php';

$tanggal     = $_GET['tanggal'] ?? '';
$jam_mulai   = $_GET['jam_mulai'] ?? '';
$jam_selesai = $_GET['jam_selesai'] ?? '';

if (empty($tanggal) || empty($jam_mulai) || empty($jam_selesai)) {
    echo json_encode([]);
    exit;
}

$query = "SELECT r.* 
          FROM ruang r
          WHERE r.STATUS_aktif = 1
          AND r.id_ruang NOT IN (
              SELECT res.id_ruang 
              FROM reservasi res
              WHERE res.tanggal = ?
              AND res.status = 'aktif'
              AND (res.jam_mulai < ? AND res.jam_selesai > ?)
          )
          ORDER BY r.nama_ruang ASC";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "sss", $tanggal, $jam_selesai, $jam_mulai);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'id_ruang'   => $row['id_ruang'],
        'nama_ruang' => $row['nama_ruang'],
        'kapasitas'  => $row['kapasitas'] ?? '-'
    ];
}

echo json_encode($data);
?>