<?php
include_once("koneksi.php");
session_start();
$nama_pengguna = "";
$wisata = "";

// Cek apakah pengguna sudah login
if (isset($_SESSION['nama'])) {
    $username = $_SESSION['nama'];
    $query = "SELECT name FROM tb_user WHERE username = '$username'";
    $hasil = mysqli_query($conn, $query);

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $nama_pengguna = $row['name'];
    } else {
        echo "Error: Pengguna tidak ditemukan";
    }
} else {
    header("location:login.php");
    exit;
}

if (isset($_SESSION['wisata'])) {
    $kode = $_SESSION['wisata'];
    $que = "SELECT nama_wisata FROM tb_wisata WHERE kode_wisata = '$kode'";
    $result = mysqli_query($conn, $que);

    if ($result && mysqli_num_rows($result) > 0) {
        $row1 = mysqli_fetch_assoc($result);
        $wisata = $row1['nama_wisata'];
    } else {
        echo "Error: Wisata tidak ditemukan";
    }
}

// Optimalkan query untuk mendapatkan data pengguna dan data wisata
$query = "SELECT * FROM `tb_user` WHERE name LIKE '$nama_pengguna'";
$hasil = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($hasil);

$que = "SELECT * FROM `tb_wisata` WHERE nama_wisata LIKE '$wisata'";
$result = mysqli_query($conn, $que);
$userWisata = mysqli_fetch_assoc($result);
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
<body style="background-image: url(./asset/bgAbout.jpg);" class="register-body">

    <nav style="position: absolute;">
        <img src="./asset/logo.png" class="logo" alt="Logo" title="Pesona Wisata">

        <ul class="navbar">
            <li>
            <a href="./user.php">Beranda</a>
            </li>
        </ul>
    </nav>

    <section class="registration">
        <div class="register-form">
            <h1>Silahkan <span>ISI</span></h1>
            <form action="" method="POST">
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $userData['name'] ?>" required="Requiered" name="Name" readonly>
                </div>

                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $userData['email'] ?>" required="Requiered" name="Email" readonly>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $userData['phone_number'] ?>" required="Requiered" name="phoneno" readonly>
                </div>
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $userWisata['nama_wisata'] ?>" required="Requiered" name="wisata" readonly>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $userWisata['harga_wisata'] ?>" required="Requiered" name="harga" readonly>
                </div>

                <div class="inputbox-register">
                    <input  type="text" required="Requiered" name="jumlah">
                    <span>Jumlah Tiket</span><br>
                </div>

                <h4>Metode Pembayaran</h4>
                <input type="radio" name="Gender" value="Male" id="" required> Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <input type="radio" name="Gender" value="Female" id=""> Cash
                <h4>Tanggal Kunjung</h4>
                <input type="date" name="Date" id="jadwal" required>
                <h4>Total Pembayaran</h4>
                    <input type="text" required="Requiered" name="harga"><br>
                <input type="checkbox" name="t&c" id="" checked required> I accept the Terms & Conditions.
                <br> <br> 

                <input type="submit" value="Signup" name="Submit" class="submitbtn">
            </form>
        </div>
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
                    <a href="https://www.facebook.com/mohd.rahil.blogger" target="_blank"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/mohdrahil101" target="_blank"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://www.twitter.com/mohdrahil101" target="_blank"><i class='bx bxl-twitter' ></i></a>
                    <a href="https://www.linkedin.com/in/mohdrahil101" target="_blank"><i class='bx bxl-linkedin' ></i></a>
                    <a href="https://www.youtube.com/techdollarz" target="_blank"><i class='bx bxl-youtube' ></i></a>
                    <a href="https://www.mohdrahil.wordpress.com" target="_blank"><i class='bx bxl-wordpress' ></i></a>
                    <a href="https://www.github.com/mohdrahil101" target="_blank"><i class='bx bxl-github'></i></a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="end">
        <p>Copyright © 2024 Pesona Wisata.<br>Website developed by: Group 4</p>
    </div>
</section>
</body>
</html>
