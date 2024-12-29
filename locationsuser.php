<?php
include_once("koneksi.php");
session_start();


function scrapePrice() {
    // URL target
    $url = "https://www.traveloka.com/en-id/hotel/search?spec=23-12-2024.24-12-2024.1.1.HOTEL_GEO.107217.Raja%20Ampat%20Regency.1"; // Ganti dengan URL yang valid

    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36"
    ]);

    $html = curl_exec($ch);

    if (curl_errno($ch)) {
        return "cURL Error: " . curl_error($ch);
    }
    curl_close($ch);

    // Parsing HTML
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Supaya tidak menampilkan error parsing
    $dom->loadHTML($html);
    libxml_clear_errors();

    // Cari elemen <div> dengan kelas yang sesuai
    $xpath = new DOMXPath($dom);
    $elements = $xpath->query('//div[contains(@class, "css-901oao") and contains(@class, "r-a5wbuh") and contains(@class, "r-b88u0q") and contains(@class, "r-1ff274t")]');

    // Ambil hanya satu elemen
    if ($elements->length > 1) {
        return $elements->item(1)->nodeValue; // Elemen pertama
    } else {
        return "Elemen <div> tidak ditemukan.";
    }
}


if(isset($_POST['Login'])) {
    $id = $_POST['nama'];
    // Lakukan pembersihan atau validasi input $id sebelum digunakan dalam query SQL

    $cek_id = mysqli_query($conn, "SELECT * FROM tb_wisata WHERE kode_wisata = '$id'");
        
    if(mysqli_num_rows($cek_id) === 1) {
        $data = mysqli_fetch_assoc($cek_id);
        $nama_wisata = $data['nama_wisata'];
        // Set session dengan data wisata yang ditemukan
        $_SESSION['wisata'] = $id; // Menyimpan kode wisata, bukan nama wisata
        header("location: prosesbeli.php");
        exit();
    } else {
        echo "Wisata tidak ditemukan"; // Tambahkan pesan kesalahan jika wisata tidak ditemukan
    }
}
$resultRajaAmpat = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Raja Ampat'");
$rowRajaAmpat = mysqli_fetch_assoc($resultRajaAmpat);
$deskRajaAmpat = $rowRajaAmpat['deskripsi'];
$jadwalRajaAmpat = $rowRajaAmpat['jadwal'];

$resultLabuanBajo = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Labuan Bajo'");
$rowLabuanBajo = mysqli_fetch_assoc($resultLabuanBajo);
$deskLabuanBajo = $rowLabuanBajo['deskripsi'];
$jadwalLabuanBajo = $rowLabuanBajo['jadwal'];

$resultDanauToba = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Danau Toba'");
$rowDanauToba = mysqli_fetch_assoc($resultDanauToba);
$deskDanauToba = $rowDanauToba['deskripsi'];
$jadwalDanauToba = $rowDanauToba['jadwal'];

$resultPulauMerah = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Merah'");
$rowPulauMerah = mysqli_fetch_assoc($resultPulauMerah);
$deskPulauMerah = $rowPulauMerah['deskripsi'];
$jadwalPulauMerah = $rowPulauMerah['jadwal'];

$resultNusaPenida = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Nusa Penida'");
$rowNusaPenida = mysqli_fetch_assoc($resultNusaPenida);
$deskNusaPenida = $rowNusaPenida['deskripsi'];
$jadwalNusaPenida = $rowNusaPenida['jadwal'];

$resultBandaNeira = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Banda Neira'");
$rowBandaNeira = mysqli_fetch_assoc($resultBandaNeira);
$deskBandaNeira = $rowBandaNeira['deskripsi'];
$jadwalBandaNeira = $rowBandaNeira['jadwal'];

$resultPulauDerawan = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Derawan'");
$rowPulauDerawan = mysqli_fetch_assoc($resultPulauDerawan);
$deskPulauDerawan = $rowPulauDerawan['deskripsi'];
$jadwalPulauDerawan = $rowPulauDerawan['jadwal'];

$resultPulauBunaken = mysqli_query($conn, "SELECT deskripsi,jadwal FROM `tb_wisata` WHERE nama_wisata='Pulau Bunaken'");
$rowPulauBunaken = mysqli_fetch_assoc($resultPulauBunaken);
$deskPulauBunaken = $rowPulauBunaken['deskripsi'];
$jadwalPulauBunaken = $rowPulauBunaken['jadwal'];

$scrapedPrice = scrapePrice();
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body class="location-body">
    <nav>
        <img src="./asset/logo.png" class="logo" alt="Logo" title="Pesona Wisata">
        <ul class="navbar">
            <li>
                <a href="./user.php">Beranda</a>
                <a href="./user.php#locations">Destinasi</a>
                <a href="./logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    
    <section class="location-section">
        <form action="" method="post">
            <div class="location-heading">
                <h1>Menyelami Keindahan <span>Indonesia</span></h1>
            </div>
            <!-- Raja Ampat -->
            <div class="location-detail" id="Papua">
                <h1>Raja Ampat (Korpak Villa &amp; Resort Raja Ampat)</h1>
                <p><?php echo $deskRajaAmpat; ?></p>
                <p>Jadwal: <?php echo $jadwalRajaAmpat; ?></p>
                <p>harga dari traveloka: <?php echo $scrapedPrice; ?></p>
                <p><a style="color: white;" href="https://www.traveloka.com/en-id/hotel/search?spec=23-12-2024.24-12-2024.1.1.HOTEL_GEO.107217.Raja%20Ampat%20Regency.1">Jika Tidak Percaya Boleh Di Check Sendiri</a></p>
                
                <div class="container-maps">
                    <div class="location-img">
                        <img src="./asset/korpak.jpg" alt="">
                    </div>
                    <div class="map">
                        <div id="map"></div> <!-- ID peta pertama -->
                    </div>
                </div>

                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                <script>
                    // Pastikan peta diinisialisasi setelah DOM siap
                    document.addEventListener("DOMContentLoaded", function() {
                        var map = L.map('map').setView([-0.4377782187581854, 130.78384585057225], 17);
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map);
                        var marker = L.marker([-0.4377782187581854, 130.78384585057225]).addTo(map);
                        marker.bindPopup("<b>Korpak Villa and Resort</b><br>Raja Ampat").openPopup();                    
                        marker.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/eUTWuCiySqT15Mh3A";
                            window.open(googleMapsUrl, "_blank");
                            marker.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('100')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Nusa Tenggara Timur">
                <h1>Labuan Bajo</h1>
                <p><?php echo $deskLabuanBajo; ?></p>
                <p>Jadwal: <?php echo $jadwalLabuanBajo; ?></p>
                <div class="container-maps">
                    <div class="location-img">
                        <img src="./asset/labuan.jpg" alt="">
                    </div>
                    <div class="map">
                        <div id="map2"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map2 = L.map('map2').setView([-8.500, 119.883], 14);
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map2);
                        var marker2 = L.marker([-8.500, 119.883]).addTo(map2);
                        marker2.bindPopup("<b>Labuan Bajo</b><br>Nusa Tenggara Timur").openPopup();                    
                        marker2.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/GDsDsjbWGkkVsmiF9";
                            window.open(googleMapsUrl, "_blank");
                            marker2.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('101')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Sumatra Utara">
                <h1>Danau Toba</h1>
                <p><?php echo $deskDanauToba; ?></p>
                <p>Jadwal: <?php echo $jadwalDanauToba; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/tobi.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map3"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map3 = L.map('map3').setView([2.68, 98.88], 12);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map3);
                        var marker3 = L.marker([2.68, 98.88]).addTo(map3);
                        marker3.bindPopup("<b>Danau Toba</b><br>Sumatera Utara").openPopup();                    
                        marker3.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/jrKRyJMUegwSXMqr7";
                            window.open(googleMapsUrl, "_blank");
                            marker3.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('102')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Jawa Timur">
                <h1>Pulau Merah</h1>
                <p><?php echo $deskPulauMerah; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauMerah; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/abang.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map4"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map4 = L.map('map4').setView([-8.5913913, 114.0166592], 14);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map4);
                        var marker4 = L.marker([-8.5913913, 114.0166592]).addTo(map4);
                        marker4.bindPopup("<b>Pulau Merah</b><br>Banyuwangi").openPopup();                    
                        marker4.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/zdqHRw461a17smdNA";
                            window.open(googleMapsUrl, "_blank");
                            marker4.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('103')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Bali">
                <h1>Nusa Penida</h1>
                <p><?php echo $deskNusaPenida; ?></p>
                <p>Jadwal: <?php echo $jadwalNusaPenida; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/penida.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map5"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map5 = L.map('map5').setView([-8.745573, 115.5376405], 13);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map5);
                        var marker5 = L.marker([-8.745573, 115.5376405]).addTo(map5);
                        marker5.bindPopup("<b>Nusa Penida</b><br>Bali").openPopup();                    
                        marker5.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/aonmk2M7QQG5GG8U7";
                            window.open(googleMapsUrl, "_blank");
                            marker5.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('104')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Maluku">
                <h1>Banda Neira</h1>
                <p><?php echo $deskBandaNeira; ?></p>
                <p>Jadwal: <?php echo $jadwalBandaNeira; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/bandar.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map6"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map6 = L.map('map6').setView([-4.5179019, 129.90406], 14);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map6);
                        var marker6 = L.marker([-4.5179019, 129.90406]).addTo(map6);
                        marker6.bindPopup("<b>Banda Neira</b><br>Maluku").openPopup();                    
                        marker6.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/j3QoeWdkXQVB4DMa6";
                            window.open(googleMapsUrl, "_blank");
                            marker6.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('105')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Kalimantan Timur">
                <h1>Pulau Derawan</h1>
                <p><?php echo $deskPulauDerawan; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauDerawan; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/dera.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map7"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map7 = L.map('map7').setView([2.2248743, 118.4634242], 11);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map7);
                        var marker7 = L.marker([2.2248743, 118.4634242]).addTo(map7);
                        marker7.bindPopup("<b>Pulau Derawan</b><br>Kalimantan Timur").openPopup();                    
                        marker7.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/6i3fTQ4ysfLEBAFx8";
                            window.open(googleMapsUrl, "_blank");
                            marker7.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('106')" value="Pesan Sekarang! >>">
            </div>

            <div class="location-detail" id="Sulawesi Utara">
                <h1>Pulau Bunaken</h1>
                <p><?php echo $deskPulauBunaken; ?></p>
                <p>Jadwal: <?php echo $jadwalPulauBunaken; ?></p>
                <div class="container-maps">
                <div class="location-img">
                    <img src="./asset/buna.jpg" alt="">
                </div>
                <div class="map">
                        <div id="map8"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var map8 = L.map('map8').setView([1.618987, 124.766183], 15);
                         L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        }).addTo(map8);
                        var marker8 = L.marker([1.618987, 124.766183]).addTo(map8);
                        marker8.bindPopup("<b>Pulau Bunaken</b><br>Sulawesi Utara").openPopup();                    
                        marker8.on('click', function() {
                            var googleMapsUrl = "https://maps.app.goo.gl/Qv3D7mYuXEQ4dpEW8";
                            window.open(googleMapsUrl, "_blank");
                            marker8.openPopup();
                        });
                    });
                </script>
                <input type="submit" class="btn-order" onclick="setNama('107')" value="Pesan Sekarang! >>">
            </div>
            <input type="hidden" name="nama" id="nama_input">
            <input type="hidden" name="Login" value="true">
        </form>
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
    <script>
        function setNama(nama) {
            document.getElementById('nama_input').value = nama;
        }
    </script>
</body>
</html>

