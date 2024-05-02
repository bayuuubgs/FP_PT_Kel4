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

    <nav>
        <img src="./asset/logo.png" class="logo" alt="Logo" title="Pesona Wisata">

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

    <section class="registration">
        <div class="register-form">
            <h1>Register <span>Here</span></h1>
            <form action="" onsubmit="return validateform()">
            <div class="inputbox-register">
                <input  type="text" required="Requiered" name="Email">
                <span>Email</span><br>
            </div>

            <div class="inputbox-register">
                <input  type="tel" required="Requiered" name="Phone">
                <span>Phone Number</span><br>
            </div>
            
            <div class="inputbox-register">
                <input  type="text" required="Requiered" name="User">
                <span>Username</span><br>
            </div>
            
            <div class="inputbox-register">
                <input  type="password" required="Requiered" name="Pass">
                <span>Password</span><br>
            </div>
            
            <div class="inputbox-register">
                <input  type="password" required="Requiered" name="CheckPass">
                <span>Confirm Password</span><br>
            </div>

            <h4>Gender</h4>
            <input type="radio" name="mygender" id="" required> Male &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            <input type="radio" name="mygender" id=""> Female
            <h4>Lahir</h4>
            <input type="datetime-local" name="returndate" id="" required>
            <br> <br> 
            <input type="checkbox" name="t&c" id="" checked required> I accept the Terms & Conditions.
            <br> <br> 

            <input type="submit" value="Submit" class="submitbtn">

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
        <p>Copyright © 2022 Firstflight Travels All Rights Reserved.<br>Website developed by: Group 4</p>
    </div>
</section>

<!-- Javascript -->
<script>
    function validateform(){ 
        var tel=document.getElementById("phonenum").value;  

        if(tel.length<10){  
            alert("Phone number must be of atleast 10 digits!");  
            return false;  
        } else if(isNaN(tel)){
            alert("Phone number should not include character!");
            return false;
        }
        return true;
}  
</script>

</body>
</html>
