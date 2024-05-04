<?php
include_once ("koneksi.php");
$query= "SELECT * FROM tb_user ";
$hasil= mysqli_query ($conn, $query);

if (isset($_POST['Submit'])) {
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $name = $_POST['Name'];
    $user = $_POST['User'];
    $pass1 = $_POST['Pass1'];
    $pass2 = $_POST['Pass2'];
    $gender = $_POST['Gender'];
    $date = $_POST['Date'];


    $cek_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user'");
    $cek_login = mysqli_num_rows($cek_user);
    
    if($cek_login > 0) {
        echo "<script>
        alert('Username Telah Terdaftar');
        window.location = 'registertrial.php';
        </script>";
    }
    else {
        if ($pass1 != $pass2) {
            echo "<script>
            alert('Konfirmasi Password Tidak Sesuai');
            window.location = 'registertrial.php';
            </script>";
        }
        else {
            mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$email', '$phone', '$name', '$user', '$pass1', '$gender', '$date')");
            echo "<script>
            alert('Akun Berhasil Dibuat!');
            window.location = 'index.php';
            </script>";
        }
    }
}
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
            <a href="./index.php">Beranda</a>
                <a href="./login.php">Login</a>
            </li>
        </ul>
    </nav>

    <section class="registration">
        <div class="register-form">
            <h1>Register <span>Here</span></h1>
            <form action="" method="POST">
                <div class="inputbox-register">
                    <input  type="text" required="Requiered" name="Email">
                    <span>Email</span><br>
                </div>

                <div class="inputbox-register">
                    <input  type="text" required="Requiered" name="Phone">
                    <span>Phone Number</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" required="Requiered" name="Name">
                    <span>Name</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="text" required="Requiered" name="User">
                    <span>Username</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="password" required="Requiered" name="Pass1">
                    <span>Password</span><br>
                </div>
                
                <div class="inputbox-register">
                    <input  type="password" required="Requiered" name="Pass2">
                    <span>Confirm Password</span><br>
                </div>

                <h4>Gender</h4>
                <input type="radio" name="Gender" value="Male" id="" required> Male &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <input type="radio" name="Gender" value="Female" id=""> Female
                <h4>Lahir</h4>
                <input type="date" name="Date" id="" required>
                <br> <br> 
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
