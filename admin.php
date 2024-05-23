<?php
include_once ("koneksi.php");
session_start();
$nama_pengguna = "";

// Apabila langsung mengakses admin.php tanpa login, maka akan diarahkan ke login.php untuk login terlebih dahulu
if (isset($_SESSION['nama'])) {
    // Jika pengguna sudah login, dapatkan nama pengguna dari $_SESSION['nama']
    $username = $_SESSION['nama'];
    // Lakukan query SQL untuk mendapatkan nama dari pengguna dengan username yang sesuai
    $query = "SELECT name FROM tb_user WHERE username = '$username'";
    $hasil = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($hasil) {
        // Ambil hasil query
        $row = mysqli_fetch_assoc($hasil);
        $nama_pengguna = $row['name'];
    } else {
        // Jika query gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Menuju login.php jika pengguna belum login
    header("location:login.php");
    exit; // Keluar dari skrip
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="icon" href="./asset/Logo.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="mainn">
        <div class="atasan">
        <nav>
            <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
            <ul class="navbar">
                <li>
                    <a href="#">Beranda</a>
                    <a href="laporan.php">Laporan Keseluruhan</a>
                    <a href="./logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
    <section class="locations" id="locations">
        <h2>Selamat Datang <?php echo $nama_pengguna; ?></h2>
        <div class="package-title">
            <h2>Kelola Wisata</h2>
        </div>

        <div class="location-content">
            
            <a class="start"><div class="col-content">
                <img src="./asset/ampat.jpg" alt="">
                <h5>Papua</h5>
                <p>Raja Ampat</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/bajo.jpg" alt="">
                <h5>Nusa Tenggara Timur</h5>
                <p>Labuan Bajo</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/toba.jpg" alt="">
                <h5>Sumatra Utara</h5>
                <p>Danau Toba</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/merah.jpg" alt="">
                <h5>Jawa Timur</h5>
                <p>Pulau Merah</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/nusa.jpg" alt="">
                <h5>Bali</h5>
                <p>Nusa Penida</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/neira.jpg" alt="">
                <h5>Maluku</h5>
                <p>bandai Neira</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/derawan.jpg" alt="">
                <h5>Kalimantan Timur</h5>
                <p>Pulau Derawan</p>
            </div></a>

            <a class="start"><div class="col-content">
                <img src="./asset/bunaken.jpg" alt="">
                <h5>Sulawesi Utara</h5>
                <p>Pulau Bunaken</p>
            </div></a>
        </div>
    </section>
</div>
    <div class="popup-login">
        <h2 style="font-size:30pt;">Masukkan Kode</h2>
        <div class="inputbox-popup">
                    <input  type="text" required="Requiered" name="User">
                    <span>Apa kodenya?</span><br>
                </div>
        <div class="btn-group">
            <button class="info-btn exit-btn">Kembali</button>
            <a href="#" class="info-btn continue-btn">Login</a>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>