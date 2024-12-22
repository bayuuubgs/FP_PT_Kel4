<?php
include_once("koneksi.php");
$id = $_GET['id'];
$setstatus = "Selesai";

$query = "UPDATE tb_pesanan SET status='$setstatus' WHERE id_pesanan='$id'";
// Jalankan query dan cek apakah berhasil
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header('location:laporanwisata.php');
} else {
    echo "input data gagal";
}
?>