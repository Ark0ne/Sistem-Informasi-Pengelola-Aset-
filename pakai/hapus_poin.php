<?php
include '../pengaturan/koneksi.php';
$id_poin = $_GET['id'];
$q = mysqli_query($konek, "delete from tb_poin641 where id_poin='$id_poin'");
if($q){
    echo"<script>alert('Data berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_poin.php">';
}else{
    echo mysqli_error($konek);
}
?>