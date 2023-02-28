<?php
    include '../pengaturan/koneksi.php';
    $id = $_GET['id']; //ambil id yang ada diurl untuk dijadikan acuan  yang mau dihapus 
    if(isset($id)){//jika button ubah di ubah data diklik
        $nip = $_GET['id'];
        
        $sql = "delete from koordinator where nip_koordinator = '$nip'";
        if (mysqli_query($konek, $sql)) {
            mysqli_query($konek, $sql);
            echo "<script>alert( 'Data Koordinator berhasil dihapus');</script>";
            echo "<meta http-equiv='refresh' content='0; url=data_koordinator.php'>";
        }else{
            echo "Terjadi kesalahan pada hapus koordinator". mysqli_error($konek);
        }
    }
?>