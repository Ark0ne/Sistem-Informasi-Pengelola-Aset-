<?php
include '../pengaturan/koneksi.php';
$id_kategori = $_GET['id'];
$q = mysqli_query($konek, "delete from kategori where id_kategori='$id_kategori'");
if($q){
    echo"<script>alert('Data berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_kategori.php">';
}else{
    echo mysqli_error($konek);
}
?>