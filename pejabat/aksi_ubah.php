<?php
include '../pengaturan/koneksi.php';
if (isset($_POST['ubah'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $kontak = $_POST['kontak'];

    $password = md5($kontak);

    $sql = "update pejabat set nama='$nama',instansi='$instansi', kontak='$kontak' where nip='$nip'";
    if (mysqli_query($konek, $sql)) {
        
        $sql = "update user set password='$password' where username='$nip'";
        mysqli_query($konek, $sql);
        echo "<script>alert('Data pejabat berhasil di perbarui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_pejabat.php">';
    } else {
        echo 'Terjadi kesalahan pada edit pejabat : '. mysqli_error($konek);
    }    
}
?>