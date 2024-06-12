<?php
include_once ("koneksi.php");

$id = $_GET['id'];

$que = "SELECT * FROM tb_pesanan WHERE id_pesanan = '$id'";
$result = mysqli_query($conn, $que);

header('Content-Type: application/json');
if ($result) {
    $detail = mysqli_fetch_assoc($result);
    echo json_encode($detail);
} else {
    echo json_encode(['error' => 'Data tidak ditemukan']);
}
?>
