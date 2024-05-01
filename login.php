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
            <button type="submit" class="btn">Login</button>
            <div class="register">
                <p><a href="owner.php">Lupa password?</a></p>
                <p> Tidak punya akun? <a href="register.php">Register.</a></p>
            </div>
        </form>
    </div>
    
    <?php
        session_start();
        $user = 'admin';
        $pw = '111';
        $user1 = 'owner';
        $pw1 = 'owner';
        
        // Apabila telah login namun admin ingin kembali ke index.php tanpa logout, maka akses tidak dapat diakses, admin harus melakukan logout terlebih dahulu
        if (isset($_SESSION['user'])) {
            header("location:admin.php");
            exit;
        }

        // Apabila telah login namun owner kembali ke index.php tanpa logout, maka akses tidak dapat diakses, owner harus melakukan logout terlebih dahulu
        if (isset($_SESSION['user1'])) {
            header("location:owner.php");
            exit;
        }

        if (isset($_POST['User']) && isset($_POST['Pass'])) {
            $U = trim($_POST['User']);
            $P = trim($_POST['Pass']);

            $_SESSION['user'] = $_POST['User'];
            if ( ($U === $user) && ($P === $pw) ) {
                // Set Session Login
                $_SESSION['user'] = $_POST['User'];

                //Apabila login berhasil, maka diarahkan ke admin.php
                header("location:admin.php");?>
                <?php
                } else {
                    echo 'user/pwword Tidak Sesuai';
                    return false;
                }
            }   
        ?>
        </body1>
</html>