<?php
include_once ("koneksi.php");
$query= "SELECT * FROM `tb_pesanan` WHERE destinasi LIKE 'Raja Ampat'";
$hasil= mysqli_query ($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
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
                <a href="laporan.php">Laporan</a>
                <a href=".#">Pengaturan</a>
                <a href="./logout.php">Logout</a>
                <a href="#"><i class="fa-solid fa-user"></i></a>
            </li>
        </ul>
    </nav>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th scope="col">Id Pelanggan</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Destinasi</th>
            <th scope="col">Harga</th>
            <th scope="col">Jadwal</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;
                while ($data=mysqli_fetch_array ($hasil)){?>
                <tr>
                    <th scope="row"> <?php echo $nomor; ?> </th>
                    <td> <?php echo $data['name']; ?> </td>
                    <td> <?php echo $data['destinasi']; ?> </td>
                    <td> <?php echo $data['harga']; ?> </td>
                    <td> <?php echo $data['jadwal']; ?> </td>
                    <!-- <td> <a href="ubahbarang.php?id=<?php echo $data['id_item'] ?>" class="text-info" >Edit</a>
                    |<a style="color: red;" href="hapusbarang.php?id=<?php echo $data['id_item'] ?>">Delete</a> </td> -->
                </tr>
            <?php $nomor++; }?>
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
</html>