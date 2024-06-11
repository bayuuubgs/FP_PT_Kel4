<?php
include_once ("koneksi.php");
$id=$_GET['id'];
$query="delete from tb_pesanan where id_pesanan=$id";
$hasil=mysqli_query($conn,$query);
if ($hasil) {
    header('location:laporanowner.php');
    }else {
    echo "Hapus Data Gagal";
    }
?>