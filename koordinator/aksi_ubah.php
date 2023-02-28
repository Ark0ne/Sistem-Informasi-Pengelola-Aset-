<?php
include '../pengaturan/koneksi.php';
if (isset($_POST['ubah'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $kontak = $_POST['kontak'];

    $password = md5($kontak);

    $sql = "update koordinator set nama_koordinator='$nama',instansi_koordinator='$instansi', 
    kontak_koordinator='$kontak' where nip_koordinator='$nip'";
    if (mysqli_query($konek, $sql)) {
        
        $sql = "update user set password='$password' where username='$nip'";
        mysqli_query($konek, $sql);
        echo "<script>alert('Data Koordinator berhasil di perbarui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_Koordinator.php">';
    } else {
        echo 'Terjadi kesalahan pada edit koordinator : '. mysqli_error($konek);
    }    
}
?>