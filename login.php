<?php
include_once ("koneksi.php");
session_start();
if(isset($_POST['Login'])) {
    $user = $_POST['User'];
    $pass = $_POST['Pass'];

    $cek_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user'");
        
    if(mysqli_num_rows($cek_user)=== 1) {
        $data = mysqli_fetch_assoc($cek_user);
            
        if (password_verify($pass, $data['password'])) {
            $_SESSION['Login'] = true;
            if ($data['username'] === "admin1" || $data['username'] === "admin2" || $data['username'] === "admin3") {
                $_SESSION['nama'] = $data['name'];
                header("location: admin.php");
                exit();
            } else {
                // Pengguna bukan admin, arahkan ke halaman index.php
                header("location: index.php");
                exit();
            }
        }else {
            // Kata sandi tidak cocok
            echo "<script>
                alert('Username atau Password salah!');
                window.location = 'login.php';
            </script>";
            exit();
        }
    }else {
        echo "<script>
            alert('Username tidak ditemukan!');
            window.location = 'login.php';
        </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="./asset/Logo.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<div class="banner">
        <video src="./asset/bgvid.mp4" type="video/mp4" autoplay muted loop></video>
    
    <!-- Header -->

    <div class="content" id="home"> 
        <nav>
            <img src="./asset/Logo.png" class="logo" alt="Logo" title="Pesona Wisata">
            
            <ul class="navbar">
                <li>
                    <a href="./index.php">Beranda</a>
                    <a href="./index.php#locations">Destinasi</a>
                    <a href="./index.php#package">Packages</a>
                    <a href="./about.php">About Us</a>
                    <a href="./login.php">Login</a>
                </li>
            </ul>
        </nav>
</body>

<body1>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="inputbox">
                    <input  type="text" required="Requiered" name="User">
                    <span>Username</span><br>
                </div>
                <div class="inputbox">
                    <input  type="password" required="Requiered" name="Pass">
                    <span>password</span><br>
                </div>
            <button type="submit" name="Login" class="btn">Login</button>
            <div class="register">
                <p><a href="owner.php">Lupa password?</a></p>
                <p> Tidak punya akun? <a href="register.php">Register.</a></p>
            </div>
        </form>
    </div>
</body1>
</html>