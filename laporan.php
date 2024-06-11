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
</head>
<body>
    <div class="atasan">
    <nav>
        <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
        <ul class="navbar">
            <li>
                <a href="admin.php">Beranda</a>
                <a href="laporan.php">Laporan Keseluruhan</a>
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
            <th scope="col">Id Pesanan</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Wisata</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Pembayaran</th>
            <th scope="col">Kedatangan</th>
            <th scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;
                while ($data=mysqli_fetch_array ($hasil)){?>
                <tr>
                    <th scope="row"> <?php echo $nomor; ?> </th>
                    <td> <?php echo $data['id_pesanan']; ?> </td>
                    <td> <?php echo $data['name']; ?> </td>
                    <td> <?php echo $data['email']; ?> </td>
                    <td> <?php echo $data['phone_number']; ?> </td>
                    <td> <?php echo $data['nama_wisata']; ?> </td>
                    <td> <?php echo $data['harga']; ?> </td>
                    <td> <?php echo $data['jumlah']; ?> </td>
                    <td> <?php echo $data['pembayaran']; ?> </td>
                    <td> <?php echo $data['tanggal_kunjung']; ?> </td>
                    <td> <?php echo $data['total']; ?> </td>
                    <!-- <td> <a href="ubahbarang.php?id=<?php echo $data['id_pesanan'] ?>" class="text-info" >Edit</a>
                    |<a style="color: red;" href="hapusbarang.php?id=<?php echo $data['id_pesanan'] ?>">Delete</a> </td> -->
                </tr>
            <?php $nomor++; }?>
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
</html>