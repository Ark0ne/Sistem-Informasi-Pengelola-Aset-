<?php
    include '../pengaturan/koneksi.php';
    $id = $_GET['id']; //ambil id yang ada diurl untuk dijadikan acuan nis siswa yang mau dihapus 
    if(isset($id)){//jika button ubah di ubah data diklik
        $nip = $_GET['id'];
        //query menghapus data siswa berdasarkan nis siswa
        $sql = "delete from pejabat where nip = '$nip'";
        if (mysqli_query($konek, $sql)) {
            //query menghapus data user berdasarkan username yang nilainya sama dengan nis siswa $sql "delete from tb_user where username = '$nis "";
            mysqli_query($konek, $sql);
            echo "<script>alert( 'Data pejabat berhasil dihapus');</script>";//muncul pesan berhasil
            echo "<meta http-equiv='refresh' content='0; url=data_pejabat.php'>";//halaman diarahkan ke data siswa.php
        }else{
            echo "Terjadi kesalahan pada hapus pejabat ". mysqli_error($konek);
        }
    }
?>