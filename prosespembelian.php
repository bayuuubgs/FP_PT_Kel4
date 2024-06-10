<?php
include_once("koneksi.php");
$nama = $_POST['Name'];
$email = $_POST ['Email'];
$telp = $_POST ['phoneno'];
$wisata = $_POST ['wisata'];
$harga= $_POST['harga'];
$total= $_POST['jumlah'];
$tipe= $_POST['Gender'];
$date= $_POST['Date'];
$totalp= $_POST['totalPembayaran'];
// Buat query untuk memasukkan data ke database
$query = "INSERT INTO tb_pesanan (name, email, phone_number, nama_wisata, harga, jumlah, pembayaran, tanggal_kunjung, total) 
VALUES ('$nama', '$email', '$telp', '$wisata', '$harga', '$total', '$tipe', '$date', '$totalp')";

// Jalankan query dan cek apakah berhasil
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header('location:index.php');
} else {
    echo "input data gagal";
}
?>