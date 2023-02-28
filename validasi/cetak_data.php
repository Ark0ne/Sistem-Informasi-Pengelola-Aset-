<?php
//memanggil file fpdf yang ada di folder assets
require '../assets/fpdf184/fpdf.php';
include '../pengaturan/koneksi.php';
//mengatur kertas: p untuk potrait, cm satuan kertas, A4 ukuran kertas
$pdf = new FPDF ('L', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetTitle('Laporan Data Aset');
/*
SetFont digunakan untuk mengatur font. Nilai pertama jenis font, Nilai kedua style: 8(bold) I(italic) U(
underline), Nilai ketiga adalah ukuran font.
*/
$pdf->SetFont("Arial", "B", "12");
/* fungsi image untuk memanggil gambar ke report. 
image memiliki 5 nilai (file image, posisi x, posisi y, lebar image, tinggi image) 
baris 16 memanggil gambar logo png, posisi x = 1, y = 1, lebar image = 2cm, tinggi = 2cm
*/
$pdf->Image('../img/logo-big.png', 2, 1, 2, 2);
/*
membuat textbox dengan fungsi Cell(lebar, tinggi, text, border, text selanjutnya, perataan, background)
*/
$pdf->Cell(27, 0.5, "KEMENTERIAN KEUANGAN REPUBLIK INDONESIA", 0, 1, "C"); 
$pdf->Cell(27, 0.5, "DIREKTORAT JENDRAL KEKAYAAN NEGARA", 0, 1, "C"); 
$pdf->Cell(27, 0.5, "KANWIL DJKN KALIMANTAN SELATAN DAN TENGAH", 0, 1, "C"); 
$pdf->Cell(27, 0.5, "KANTOR PELAYANAN KEKAYAAN NEGARA DAN LELANG", 0, 1, "C"); 
$pdf->SetFont("Arial", "", "10");
$pdf->Cell (27, 1, "Jl. Pramuka No. 7 Banjarmasin", 0, 1, "C");
$pdf->line(2, 4, 28, 4);//membuat garis, line (x1, y1, x2, y2); 
$pdf->ln(1);//fungsi in sama seperti <br>
$pdf->SetFont("Arial", "B", "10");//mengatur font agar tebal
$pdf->Cell (27, 1, "Laporan Data Aset", 0, 1, 'C');
$pdf->ln();
$pdf->Cell(1, 1, '',0,0, 'c');
//setfillcolor untuk mengatur background color. ada 3 nilai (Red, Green, Blue). nilai dari 0-255
$pdf->SetFillColor(20, 40, 255);
//baris 33, 34, 35 nilai ke 7 diisi 1 agar setfillcolornya / backgroundnya aktif
$pdf->Cell(1, 1, 'ID', 1, 0, 'C', 1);
$pdf->Cell(7, 1, 'Nama Aset', 1, 0, 'C', 1);
$pdf->Cell(3.2, 1, 'Nama Koordinator', 1, 0, 'C', 1);
$pdf->Cell(3, 1, 'Kategori Aset', 1, 0, 'C', 1);
$pdf->Cell(2, 1, 'Tanggal', 1, 0, 'C', 1);
$pdf->Cell(3, 1, 'Status', 1, 0, 'C', 1);
$pdf->Cell(7, 1, 'Deskripsi', 1, 1, 'C', 1);
$pdf->SetFont("Arial", "", "10");//mengatur font agar data guru tanpa style tebal

if (isset($_POST['cetak'])){
    $status= $_POST['cbcetak'];
    if ($status=='seluruh'){
        $query= mysqli_query($konek, "select * from view_aset");//mengambil data dari view guru
    }else{
	    $query= mysqli_query($konek, "select * from view_aset where status ='$status'");}//mengambil data dari view guru
while($row = mysqli_fetch_array($query)){ 
    $pdf->Cell(1, 1, '',0, 0, 'c'); 
    $pdf->Cell(1, 1, $row['id_aset'], 1, 0, 'C');
    $pdf->Cell(7, 1, $row['nama_aset'], 1, 0, 'C'); 
    $pdf->Cell(3.2, 1, $row['nama_koordinator'], 1, 0, 'C');
    $pdf->Cell(3, 1, $row['nama_kategori'], 1, 0, 'C');
    $pdf->Cell(2, 1, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(3, 1, $row['status'], 1, 0, 'C');
    $pdf->Cell(7, 1, $row['deskripsi'], 1, 1, 'C');  }
} 
$pdf->ln();
$pdf->SetFont("Arial", "", "10");
$pdf->Cell (27, 1, "BERTANDA TANGAN", 0, 1, "R");
$pdf->ln();
$pdf->Cell (26.2, 1, "..................", 0, 1, "R");
$pdf->output();
?>