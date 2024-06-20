<?php
include_once ("koneksi.php");
$query= "SELECT * FROM tb_pesanan";
$hasil= mysqli_query ($conn, $query);
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
    <script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
    <div class="atasan">
    <nav>
        <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
        <ul class="navbar">
            <li>
                <a href="owner.php">Beranda</a>
                <a href="laporan_pdf.php" target="_blank" >PRINT</a>
                <a href="./logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    </div>
    <div class="alert alert-dark text-center" role="alert">
        <h2>Laporan Wisata Keseluruhan</h2>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Wisata</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Pembayaran</th>
            <th scope="col">Kedatangan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;
                while ($data=mysqli_fetch_array ($hasil)){?>
                <tr>
                    <th scope="row"> <?php echo $nomor; ?> </th>
                    <td> <?php echo $data['name']; ?> </td>
                    <td> <?php echo $data['email']; ?> </td>
                    <td> <?php echo $data['phone_number']; ?> </td>
                    <td> <?php echo $data['nama_wisata']; ?> </td>
                    <td> <?php echo $data['harga']; ?> </td>
                    <td> <?php echo $data['jumlah']; ?> </td>
                    <td> <?php echo $data['pembayaran']; ?> </td>
                    <td> <?php echo $data['tanggal_kunjung']; ?> </td>
                    <td> <?php echo $data['total']; ?> </td>
                    <td> <?php echo $data['status']; ?> </td>
                    <td> <a href="editpesanan.php?id=<?php echo $data['id_pesanan'] ?>" class="text-info" >Edit</a>
                    |<a style="color: red;" href="hapuspesanan.php?id=<?php echo $data['id_pesanan'] ?>">Delete</a> </td>
                </tr>
            <?php $nomor++; }?>
        </tbody>
    </table>
    
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
                        $jumlah_raja_ampat = mysqli_query($conn, "SELECT jumlah FROM tb_pesanan WHERE nama_wisata='Raja Ampat'");
                        echo mysqli_num_rows($jumlah_raja_ampat);
                        ?>, 
                        <?php 
                        $jumlah_labuan_bajo = mysqli_query($conn, "SELECT jumlah FROM tb_pesanan WHERE nama_wisata='Labuan Bajo'");
                        echo mysqli_num_rows($jumlah_labuan_bajo);
                        ?>, 
                        <?php 
                        $jumlah_danau_toba = mysqli_query($conn, "SELECT jumlah FROM tb_pesanan WHERE nama_wisata='Danau Toba'");
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
</html>