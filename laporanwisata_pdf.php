<?php
// memanggil library FPDF
require ('library/fpdf.php');
include_once ("koneksi.php");
session_start();
$nama_wisata = "";
if (isset($_SESSION['destinasi'])) {
    $name = $_SESSION['destinasi'];
    $que = "SELECT nama_wisata FROM tb_wisata WHERE nama_wisata = '$name'";
    $hasil1 = mysqli_query($conn, $que);

    // Periksa apakah query berhasil dieksekusi
    if ($hasil1) {
        // Ambil hasil query
        $row = mysqli_fetch_assoc($hasil1);
        $nama_wisata = $row['nama_wisata'];
    } else {
        // Jika query gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }

} 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Laporan Wisata',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(25,7,'Id Pelanggan' ,1,0,'C');
$pdf->Cell(70,7,'Nama Pelanggan',1,0,'C');
$pdf->Cell(25,7,'Destinasi',1,0,'C');
$pdf->Cell(25,7,'Harga',1,0,'C');
$pdf->Cell(35,7,'Jadwal',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($conn,"SELECT * FROM `tb_pesanan` WHERE destinasi LIKE '$nama_wisata'");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(25,6, $d['id_user'],1,0);
  $pdf->Cell(70,6, $d['name'],1,0);  
  $pdf->Cell(25,6, $d['destinasi'],1,0);
  $pdf->Cell(25,6, $d['harga'],1,0);
  $pdf->Cell(35,6, $d['jadwal'],1,1);
}
 
$pdf->Output();
 
?>