<?php
header('Content-Type: application/json');

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_pesonawisata';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan total jumlah untuk setiap nama_wisata
$sql = "SELECT nama_wisata, SUM(jumlah) AS total_jumlah FROM tb_pesanan GROUP BY nama_wisata";
$result = $conn->query($sql);

$dataPoints = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoints[] = [
            "label" => $row['nama_wisata'],
            "y" => (int)$row['total_jumlah'] 
        ];
    }
}

$conn->close();

echo json_encode($dataPoints);
?>