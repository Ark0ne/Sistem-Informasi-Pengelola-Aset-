<?php
include '../pengaturan/koneksi.php';
if (isset($_GET['valid'])) {
    $id = $_GET['id_aset']; //ambil no pelanggaran yang disimpan di id pada url 
    $status = $_GET['valid']; //ambil status yang ada di url 
    $deskripsi = $_GET['deskripsi'];
}else if (isset($_GET['tidakvalid'])){
    $id = $_GET['id_aset']; //ambil no pelanggaran yang disimpan di id pada url 
    $status = $_GET['tidakvalid']; //ambil status yang ada di url 
    $deskripsi = $_GET['deskripsi'];

}
    //query untuk mengubah data pelanggaran
    $sql = "update aset set status='$status',deskripsi ='$deskripsi' where id_aset='$id'";
    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Data Aset berhasil $status!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_aset.php">';
    } else {
        echo 'Terjadi kesalahan pada status aset: ', mysqli_error($konek);
    }

?>