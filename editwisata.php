<?php
include_once("koneksi.php");
$id =$_POST['id'];
$Nama = $_POST ['nama'];
$Harga = $_POST ['harga'];
$Deskripsi = $_POST['deskripsi'];
$Jadwal = $_POST ['jadwal'];
// Buat query untuk memasukkan data ke database
$query = "UPDATE tb_wisata SET nama_wisata='$Nama', harga_wisata='$Harga', deskripsi='$Deskripsi', jadwal='$Jadwal' WHERE id_wisata='$id'";

// Jalankan query dan cek apakah berhasil
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    echo "<script>
    alert('Data Berhasil Diganti');
    window.location = 'kelolawisata.php';
    </script>" ;
} else {
    echo "input data gagal";
}
?>