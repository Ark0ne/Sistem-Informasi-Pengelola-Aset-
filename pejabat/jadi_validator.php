<?php
include '../pengaturan/koneksi.php';
if (isset($_GET['id'])) {
    $nip = $_GET['id'];//ambil nilai id yang ada di url simpan di variabel $nip
    $sql = mysqli_query($konek, "select * from user where status='validator'");//query mengambil data kesiswaan
    if(mysqli_num_rows($sql)>0){
        $data = mysqli_fetch_array($sql);
        $username = $data['username']; //mengambil username yang statusnya kesiswaan
        //dari username yang diambil, ubah statusnya menjadi guru 
        mysqli_query($konek, "update user set status = 'pejabat' where username='$username'");
    }
    //kemudian ubah status guru yang dipilih menjadi kesiswaan
    $sql = "update user set status = 'validator' where username='$nip'"; 
    if (mysqli_query($konek, $sql)) {
        echo "<script> alert('Data berhasil diperbaharui!');</script>"; 
        echo '<meta http-equiv="refresh" content="0; url=data_guru.php">';
    } else {
        echo 'Terjadi kesalahan pada ubah status pejabat: ' .mysqli_error($konek);
    }    
}
?>