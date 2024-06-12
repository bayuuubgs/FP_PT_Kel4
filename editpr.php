<?php
include_once("koneksi.php");
$id =$_POST['id'];
$email = $_POST ['Email'];
$telp = $_POST ['Phone'];
$nama = $_POST['Name'];
$user = $_POST ['User'];
// Buat query untuk memasukkan data ke database
$query = "UPDATE tb_user SET email='$email', phone_number='$telp', name='$nama', username='$user' WHERE id_user='$id'";

// Jalankan query dan cek apakah berhasil
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    echo "<script>
    alert('Data Berhasil Diganti');
    window.location = 'user.php';
    </script>" ;
} else {
    echo "input data gagal";
}
?>