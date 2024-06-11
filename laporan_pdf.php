<?php
// memanggil library FPDF
require ('library/fpdf.php');
include_once ("koneksi.php");
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(280,10,'LAPORAN WISATA',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(19,7,'ID Pesanan' ,1,0,'C');
$pdf->Cell(30,7,'Nama Pelanggan',1,0,'C');
$pdf->Cell(60,7,'Email',1,0,'C');
$pdf->Cell(25,7,'Phone Number',1,0,'C');
$pdf->Cell(25,7,'Nama Wisata',1,0,'C');
$pdf->Cell(25,7,'Harga',1,0,'C');
$pdf->Cell(15,7,'Jumlah',1,0,'C');
$pdf->Cell(25,7,'Pembayaran',1,0,'C');
$pdf->Cell(25,7,'Kedatangan',1,0,'C');
$pdf->Cell(23,7,'Total Harga',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($conn,"SELECT* FROM tb_pesanan");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(19,6, $d['id_pesanan'],1,0);
  $pdf->Cell(30,6, $d['name'],1,0);  
  $pdf->Cell(60,6, $d['email'],1,0);
  $pdf->Cell(25,6, $d['phone_number'],1,0);
  $pdf->Cell(25,6, $d['nama_wisata'],1,0);
  $pdf->Cell(25,6, $d['harga'],1,0);
  $pdf->Cell(15,6, $d['jumlah'],1,0);
  $pdf->Cell(25,6, $d['pembayaran'],1,0);
  $pdf->Cell(25,6, $d['tanggal_kunjung'],1,0);
  $pdf->Cell(23,6, $d['total'],1,1);
}
 
$pdf->Output();
 
?>