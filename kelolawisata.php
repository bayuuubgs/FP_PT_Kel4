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
$query= "SELECT * FROM `tb_wisata` WHERE nama_wisata LIKE '$nama_wisata'";
$hasil= mysqli_query ($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Wisata</title>
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
<body style="background-image: url(./asset/bgAbout.jpg);" class="register-body">
    <nav style="position: absolute;">
        <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">

        <ul class="navbar">
            <li>
            <a href="./admin.php">Kembali</a>
            </li>
        </ul>
    </nav>
    <section class="registration">
        <div class="register-form">
            <h1>Edit <span>Profile</span></h1>
            <form action="editpr.php" method="POST">
            <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <input type="hidden" name="id" value="<?php echo $data['nama_wisata'] ?>">
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['nama_wisata'] ?>" required="Requiered" name="wisata" readonly>
                </div>

                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['harga_wisata'] ?>" required="Requiered" name="Harga">
                    <span>Harga Wisata</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['deskripsi'] ?>" required="Requiered" name="deskripsi">
                    <span>Deskripsi</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['jadwal'] ?>" required="Requiered" name="jadwal">
                    <span>jadwal</span><br>
                </div>
                
                <!-- <div class="inputbox-register">
                    <input  type="password"  required="Requiered" name="Pass1">
                    <span>Password</span><br>
                </div>
                <h4>Lahir</h4>
                <input type="date" name="Date" id="" required>
                 -->
                 <br> <br> 

                <input type="submit" value="Edit" name="Submit" class="submitbtn">
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
                <a href="https://github.com/NovallFirmansyah/Project-UASS.git" target="_blank"><i class='bx bxl-github'></i></a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="end">
        <p>Copyright © 2024 Pesona Wisata.<br>Website developed by: Group 4</p>
    </div>
</section>
<?php } ?>
</body>
</html>