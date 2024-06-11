<?php
include_once ("koneksi.php");
session_start();
$nama_pengguna = "";

// Apabila langsung mengakses user.php tanpa login, maka akan diarahkan ke login.php untuk login terlebih dahulu
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
$query = "SELECT * FROM `tb_pesanan` WHERE name LIKE '$nama_pengguna'";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Wisata</title>
    <link rel="icon" href="./asset/Logo.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   
</head>

<body>
    <div class="atasan">
        <nav>
            <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
            <ul class="navbar">
                <li>
                    <a href="./user.php">Beranda</a>
                </li>
            </ul>
        </nav>
    </div>
        <div class="text">
            <h2>Riwayat Transaksi</h2>
        </div>

        <div class="rowitemstr">
            <?php $nomor=1;
            while ($data=mysqli_fetch_array ($hasil)){?>
            <div class="containertr">
            <h4>Id Transaksi <?php echo $data['id_pesanan']; ?></h4>                
            <p><?php echo $data['name']; ?></p>
            <p><?php echo $data['nama_wisata']; ?></p>
            <p><?php echo $data['tanggal_kunjung']; ?></p><br>
            <button class="btn-order">Lihat Selengkapnya!</button>
        </div>
        <?php $nomor++; }?>
    </div>
    <div class="popup-login">
        <form action="" method="POST">
        <h2 style="font-size:30pt;">Masukkan Kode</h2>
        <h3>Pilih Wisata :</h3><br>
        <div class="dropdown">
            <select name="Wisata">
                <option value="Raja Ampat">Raja Ampat</option>
                <option value="Labuan Bajo">Labuan Bajo</option>
                <option value="Danau Toba">Danau Toba</option>
                <option value="Pulau Merah">Pulau Merah</option>
                <option value="Nusa Penida">Nusa Penida</option>
                <option value="Banda Neira">Banda Neira</option>
                <option value="Pulau Derawan">Pulau Derawan</option>
                <option value="Pulau Bunaken">Pulau Bunaken</option>
            </select>
        </div>
        <div class="inputbox-popup">
            <input type="text" required="Required" name="Kode">
            <span>Apa kodenya?</span><br>
        </div>
        <div class="btn-group">
            <button class="info-btn exit-btn" type="button">Kembali</button>
            <button type="submit" name="Loginkode" class="info-btn">Login</button>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>