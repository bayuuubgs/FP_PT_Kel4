<?php
include_once("koneksi.php");
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
    <title>Owner Page</title>
    <link rel="icon" href="./asset/Logo.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
<div class="atasan">
    <nav>
        <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
        <ul class="navbar">
            <li>
                <a href="#">Beranda</a>
                <a href="laporanowner.php">Laporan</a>
                <a href="./logout.php">Logout</a>
                <a href="#"><i class="fa-solid fa-user"></i></a>
            </li>
        </ul>
    </nav>
</div>
<div class="innerr">
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Nama Wisata</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Pembayaran</th>
                <th>Tanggal Kunjung</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_pesanan");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['name']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['phone_number']; ?></td>
                    <td><?php echo $d['nama_wisata']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['pembayaran']; ?></td>
                    <td><?php echo $d['tanggal_kunjung']; ?></td>
                    <td><?php echo $d['total']; ?></td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

    <br>
    <br>

    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Raja Ampat", "Labuan Bajo", "Danau Toba", "Pulau Merah", "Nusa Penida", "Banda Neira", "Pulau Derawan", "Pulau Bunaken"],
                datasets: [{
                    label: 'Jumlah Pesanan',
                    data: [
                        <?php 
                        $jumlah_raja_ampat = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Raja Ampat'");
                        echo mysqli_num_rows($jumlah_raja_ampat);
                        ?>, 
                        <?php 
                        $jumlah_labuan_bajo = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Labuan Bajo'");
                        echo mysqli_num_rows($jumlah_labuan_bajo);
                        ?>, 
                        <?php 
                        $jumlah_danau_toba = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Danau Toba'");
                        echo mysqli_num_rows($jumlah_danau_toba);
                        ?>, 
                        <?php 
                        $jumlah_pulau_merah = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Pulau Merah'");
                        echo mysqli_num_rows($jumlah_pulau_merah);
                        ?>, 
                        <?php 
                        $jumlah_nusa_penida = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Nusa Penida'");
                        echo mysqli_num_rows($jumlah_nusa_penida);
                        ?>, 
                        <?php 
                        $jumlah_banda_neira = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Banda Neira'");
                        echo mysqli_num_rows($jumlah_banda_neira);
                        ?>, 
                        <?php 
                        $jumlah_pulau_derawan = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Pulau Derawan'");
                        echo mysqli_num_rows($jumlah_pulau_derawan);
                        ?>, 
                        <?php 
                        $jumlah_pulau_bunaken = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE nama_wisata='Pulau Bunaken'");
                        echo mysqli_num_rows($jumlah_pulau_bunaken);
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>

</body>
</html>
