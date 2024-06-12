<?php
include_once("koneksi.php");
$id=$_GET['id'];
$query="SELECT * FROM tb_pesanan WHERE id_pesanan=" . $id;
$hasil=mysqli_query($conn,$query);
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
    <script>
        function calculateTotal() {
            // Ambil nilai dari input jumlah tiket dan harga per tiket
            var jumlahTiket = document.getElementById('jumlah').value;
            var hargaPerTiket = document.getElementById('hargaPerTiket').value;

            // Pastikan nilai jumlah tiket dan harga per tiket berupa angka
            jumlahTiket = parseInt(jumlahTiket);
            hargaPerTiket = parseInt(hargaPerTiket);

            // Hitung total pembayaran
            var totalPembayaran = jumlahTiket * hargaPerTiket;

            // Tampilkan total pembayaran di input total pembayaran
            document.getElementById('totalPembayaran').value = totalPembayaran;
        }
    </script>

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
            <form action="proseseditpesanan.php" method="POST">
            <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['name'] ?>" required="Requiered" name="Name" readonly>
                </div>

                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['email'] ?>" required="Requiered" name="Email" readonly>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['phone_number'] ?>" required="Requiered" name="phoneno" readonly>
                </div>
                <div class="inputbox-register">
                    <input  type="text" value="<?php echo $data['nama_wisata'] ?>" required="Requiered" name="wisata" readonly>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" id="hargaPerTiket" value="<?php echo $data['harga'] ?>" required="Requiered" name="harga" readonly>
                </div>

                <div class="inputbox-register">
                    <input type="number" id="jumlah" value="<?php echo $data['jumlah'] ?>" name="jumlah" required="Requiered" oninput="calculateTotal()">
                    <span>Jumlah Tiket</span><br>
                </div>

                <h4>Metode Pembayaran</h4>
                <input type="radio" name="Gender" value="Transfer" id="" required> Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <input type="radio" name="Gender" value="Cash" id=""> Cash
                <h4>Tanggal Kunjung</h4>
                <input type="date" name="Date" id="jadwal" required>
                <h4>Total Pembayaran</h4>
                    <input type="text" id="totalPembayaran" required="Requiered" name="totalPembayaran" readonly><br>
                <input type="checkbox" name="t&c" id="" checked required> I accept the Terms & Conditions.
                <br> <br> 

                <input type="submit" value="Confirmm" name="Submit" class="submitbtn">
            </form>
            <?php } ?>
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
</body>
</html>
