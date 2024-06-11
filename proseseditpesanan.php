<?php
include_once("koneksi.php");
$id =$_POST['id'];
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
$query = "UPDATE tb_pesanan SET name='$nama', email='$email', phone_number='$telp', nama_wisata='$wisata', harga='$harga', jumlah='$total', pembayaran='$tipe', tanggal_kunjung='$date', total='$totalp' WHERE id_pesanan='$id'";

// Jalankan query dan cek apakah berhasil
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header('location:owner.php');
} else {
    echo "input data gagal";
}
?>