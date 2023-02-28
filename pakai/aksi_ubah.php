<?php
include '../pengaturan/koneksi.php';
if (isset($_POST['ubah'])) {
    $id_guna = $_POST['id_guna'];
    $aset = $_POST['nama_aset'];
    $npwp = $_POST['npwp'];
    $nama = $_POST['nama_pengguna'];
    $tipe = $_POST['tipe'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];


    $$query = "update penggunaan set id_aset='$aset',atas_nama='$nama',tipe='$tipe',npwp='$npwp',tanggal_mulai='$awal',tanggal_akhir='$akhir' where id_guna='$id_guna'";
    if (mysqli_query($konek, $$query)) {
        echo "<script>alert('Data Pengunaan Aset berhasil di perbarui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_pakai.php">';
    } else {
        echo 'Terjadi kesalahan pada edit data penggunaan aset : '. mysqli_error($konek);
    }    
}
?>