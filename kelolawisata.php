<?php
include_once ("koneksi.php");
session_start();
$nama_wisata = "";
if (isset($_SESSION['destinasi'])) {
    $name = $_SESSION['destinasi'];
    $que = "SELECT nama_wisata FROM tb_wisata WHERE nama_wisata = '$name'";
    $hasil1 = mysqli_query($conn, $que);

    // Periksa apakah query berhasil dieksekusi
    if ($hasil1) {
        // Ambil hasil query
        $row = mysqli_fetch_assoc($hasil1);
        $nama_wisata = $row['nama_wisata'];
    } else {
        // Jika query gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <link rel="icon" href="./asset/Logo.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="atasan">
        <nav>
            <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
            <ul class="navbar">
                <li>
                    <a href="#">Profile</a>
                    <a href="laporanwisata.php">Laporan</a>
                    <a href="admin.php">Kembali</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="alert alert-dark text-center" role="alert">
        <h2>Profile Wisata <?php echo $nama_wisata; ?></h2>
    </div>
</body>
</html>