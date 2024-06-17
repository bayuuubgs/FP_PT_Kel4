<?php
include_once("koneksi.php");
session_start();

if(isset($_POST['Login'])) {
    $id = $_POST['nama'];
    // Lakukan pembersihan atau validasi input $id sebelum digunakan dalam query SQL

    $cek_id = mysqli_query($conn, "SELECT * FROM tb_wisata WHERE kode_wisata = '$id'");
        
    if(mysqli_num_rows($cek_id) === 1) {
        $data = mysqli_fetch_assoc($cek_id);
        $nama_wisata = $data['nama_wisata'];
        // Set session dengan data wisata yang ditemukan
        $_SESSION['wisata'] = $id; // Menyimpan kode wisata, bukan nama wisata
        header("location: prosesbeli.php");
        exit();
    } else {
        echo "Wisata tidak ditemukan"; // Tambahkan pesan kesalahan jika wisata tidak ditemukan
    }
}
$resultRajaAmpat = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Raja Ampat'");
$rowRajaAmpat = mysqli_fetch_assoc($resultRajaAmpat);
$deskRajaAmpat = $rowRajaAmpat['deskripsi'];
$jadwalRajaAmpat = $rowRajaAmpat['jadwal'];

$resultLabuanBajo = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Labuan Bajo'");
$rowLabuanBajo = mysqli_fetch_assoc($resultLabuanBajo);
$deskLabuanBajo = $rowLabuanBajo['deskripsi'];
$jadwalLabuanBajo = $rowLabuanBajo['jadwal'];

$resultDanauToba = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Danau Toba'");
$rowDanauToba = mysqli_fetch_assoc($resultDanauToba);
$deskDanauToba = $rowDanauToba['deskripsi'];
$jadwalDanauToba = $rowDanauToba['jadwal'];

$resultPulauMerah = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Merah'");
$rowPulauMerah = mysqli_fetch_assoc($resultPulauMerah);
$deskPulauMerah = $rowPulauMerah['deskripsi'];
$jadwalPulauMerah = $rowPulauMerah['jadwal'];

$resultNusaPenida = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Nusa Penida'");
$rowNusaPenida = mysqli_fetch_assoc($resultNusaPenida);
$deskNusaPenida = $rowNusaPenida['deskripsi'];
$jadwalNusaPenida = $rowNusaPenida['jadwal'];

$resultBandaNeira = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Banda Neira'");
$rowBandaNeira = mysqli_fetch_assoc($resultBandaNeira);
$deskBandaNeira = $rowBandaNeira['deskripsi'];
$jadwalBandaNeira = $rowBandaNeira['jadwal'];

$resultPulauDerawan = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Derawan'");
$rowPulauDerawan = mysqli_fetch_assoc($resultPulauDerawan);
$deskPulauDerawan = $rowPulauDerawan['deskripsi'];
$jadwalPulauDerawan = $rowPulauDerawan['jadwal'];

$resultPulauBunaken = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Bunaken'");
$rowPulauBunaken = mysqli_fetch_assoc($resultPulauBunaken);
$deskPulauBunaken = $rowPulauBunaken['deskripsi'];
$jadwalPulauBunaken = $rowPulauBunaken['jadwal'];
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
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body class="location-body">
    <nav>
        <img src="./asset/logo.png" class="logo" alt="Logo" title="Pesona Wisata">
        <ul class="navbar">
            <li>
                <a href="./user.php">Beranda</a>
                <a href="./user.php#locations">Destinasi</a>
                <a href="./logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    
    <section class="location-section">
        <form action="" method="post">
            <div class="location-heading">
                <h1>Menyelami Keindahan <span>Indonesia</span></h1>
            </div>
            <div class="location-detail" id="Papua">
                <h1>Raja Ampat</h1>
                <p><?php echo $deskRajaAmpat; ?></p>
                <p>Jadwal: <?php echo $jadwalRajaAmpat; ?></p>
                <div class="location-img">
                    <img src="./asset/papat.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('100')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Nusa Tenggara Timur">
                <h1>Labuan Bajo</h1>
                <p><?php echo $deskLabuanBajo; ?></p>
                <p>Jadwal: <?php echo $jadwalLabuanBajo; ?></p>
                <div class="location-img">
                    <img src="./asset/labuan.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('101')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Sumatra Utara">
                <h1>Danau Toba</h1>
                <p><?php echo $deskDanauToba; ?></p>
                <p>Jadwal: <?php echo $jadwalDanauToba; ?></p>
                <div class="location-img">
                    <img src="./asset/tobi.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('102')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Jawa Timur">
                <h1>Pulau Merah</h1>
                <p><?php echo $deskPulauMerah; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauMerah; ?></p>
                <div class="location-img">
                    <img src="./asset/abang.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('103')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Bali">
                <h1>Nusa Penida</h1>
                <p><?php echo $deskNusaPenida; ?></p>
                <p>Jadwal: <?php echo $jadwalNusaPenida; ?></p>
                <div class="location-img">
                    <img src="./asset/penida.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('104')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Maluku">
                <h1>Banda Neira</h1>
                <p><?php echo $deskBandaNeira; ?></p>
                <p>Jadwal: <?php echo $jadwalBandaNeira; ?></p>
                <div class="location-img">
                    <img src="./asset/bandar.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('105')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Kalimantan Timur">
                <h1>Pulau Derawan</h1>
                <p><?php echo $deskPulauDerawan; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauDerawan; ?></p>
                <div class="location-img">
                    <img src="./asset/dera.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('106')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Sulawesi Utara">
                <h1>Pulau Bunaken</h1>
                <p><?php echo $deskPulauBunaken; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauBunaken; ?></p>
                <div class="location-img">
                    <img src="./asset/buna.jpg" alt="">
                </div>
                <input type="submit" class="btn-order" onclick="setNama('107')" value="Pesan Sekarang! >>">
            </div>
            <input type="hidden" name="nama" id="nama_input">
            <input type="hidden" name="Login" value="true">
        </form>
    </section>
        <!-- Footer -->

    <section class="footer">
        <div class="foot">
            <div class="footer-content">
                <div class="footlinks">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="./register.php">Register</a></li>
                        <li><a href="./about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footlinks">
                    <h4>Connect</h4>
                    <div class="social">
                    <a href="https://github.com/NovallFirmansyah/Project-UASS.git" target="_blank"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="end">
            <p>Copyright © 2024 Pesona Wisata.<br>Website developed by: Group 4</p>
        </div>
    </section>
    <script>
        function setNama(nama) {
            document.getElementById('nama_input').value = nama;
        }
    </script>
</body>
</html>
