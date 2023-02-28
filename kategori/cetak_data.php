<?php
//memanggil file fpdf yang ada di folder assets
require '../assets/fpdf184/fpdf.php';
include '../pengaturan/koneksi.php';
//mengatur kertas: p untuk potrait, cm satuan kertas, A4 ukuran kertas
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetTitle('Laporan Kategori Aset');
/*
SetFont digunakan untuk mengatur font. Nilai pertama jenis font, Nilai kedua style: 8(bold) I(italic) U(
underline), Nilai ketiga adalah ukuran font.
*/
$pdf->SetFont("Arial", "B", "12");
/* fungsi image untuk memanggil gambar ke report. 
image memiliki 5 nilai (file image, posisi x, posisi y, lebar image, tinggi image) 
baris 16 memanggil gambar logo png, posisi x = 1, y = 1, lebar image = 2cm, tinggi = 2cm
*/
$pdf->Image('../img/logo-big.png', 1, 1, 2, 2);
/*
membuat textbox dengan fungsi Cell(lebar, tinggi, text, border, text selanjutnya, perataan, background)
*/
$pdf->Cell(20, 0.5, "KEMENTERIAN KEUANGAN REPUBLIK INDONESIA", 0, 1, "C"); 
$pdf->Cell(20, 0.5, "DIREKTORAT JENDRAL KEKAYAAN NEGARA", 0, 1, "C"); 
$pdf->Cell(20, 0.5, "KANWIL DJKN KALIMANTAN SELATAN DAN TENGAH", 0, 1, "C"); 
$pdf->Cell(20, 0.5, "KANTOR PELAYANAN KEKAYAAN NEGARA DAN LELANG", 0, 1, "C"); 
$pdf->SetFont("Arial", "", "10");
$pdf->Cell (20, 1, "Jl. Pramuka No. 7 Banjarmasin", 0, 1, "C");
$pdf->line(1, 4, 20, 4);//membuat garis, line (x1, y1, x2, y2); 
$pdf->ln(2);//fungsi in sama seperti <br>
$pdf->SetFont("Arial", "B", "10");//mengatur font agar tebal
$pdf->Cell (19, 1, "Laporan Kategori Terdaftar", 0, 1, 'C');
$pdf->ln();
$pdf->Cell(1, 1, '',0,0, 'c');
//setfillcolor untuk mengatur background color. ada 3 nilai (Red, Green, Blue). nilai dari 0-255
$pdf->SetFillColor(20, 40, 255);
//baris 33, 34, 35 nilai ke 7 diisi 1 agar setfillcolornya / backgroundnya aktif
$pdf->Cell(3, 1, 'ID Kategori', 1, 0, 'C', 1);
$pdf->Cell(5, 1, 'Nama Kategori', 1, 0, 'C', 1);
$pdf->Cell(5, 1, 'Tanggal', 1, 0, 'C', 1);
$pdf->Cell(5, 1, 'Jumlah Aset Terdaftar', 1, 1, 'C', 1); 
$pdf->SetFont("Arial", "", "10");//mengatur font agar data kelas tanpa style tebal
$query= mysqli_query($konek, "select * from view_kategori");//mengambil data dari view kelas
while($row = mysqli_fetch_array($query)){ 
    $pdf->Cell(1, 1, '',0, 0, 'c'); 
    $pdf->Cell(3, 1, $row['id_kategori'], 1, 0, 'C');
    $pdf->Cell(5, 1, $row['nama_kategori'], 1, 0, 'C'); 
    $pdf->Cell(5, 1, $row['tanggal'], 1, 0, 'C'); 
    $pdf->Cell(5, 1, $row['jumlah'], 1, 1, 'C');    
} 
$pdf->ln();
$pdf->SetFont("Arial", "", "10");
$pdf->Cell (19, 1, "BERTANDA TANGAN", 0, 1, "R");
$pdf->ln();
$pdf->ln();
$pdf->Cell (18.2, 1, "..................", 0, 1, "R");
$pdf->output();
?>