<?php
include '../pengaturan/koneksi.php';
if(isset($_POST['simpan'])){
    $aset = $_POST['nama_aset'];
    $npwp = $_POST['npwp'];
    $nama = $_POST['nama_pengguna'];
    $tipe = $_POST['tipe'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    //$proses= mysqli_query($koneksi,"select * from penggunaan WHERE id_aset = '$aset'");
    //$data_aset = mysqli_fetch_array($proses);
    //$cek = mysqli_num_rows($proses);

    //if($cek>0){
        //echo "<script>window.alert('Aset Sudah Terdaftar')window.location='data_pakai.php'</script>";
    //}else {
    $query = "insert into penggunaan(id_aset,atas_nama,tipe,npwp,tanggal_mulai,tanggal_akhir) 
                            values ('$aset','$nama','$tipe','$npwp','$awal','$akhir')";
    if(mysqli_query($konek, $query)){
        echo "<script>alert('Data Penggunaan berhasil disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=data_pakai.php'>";
    } else {
        echo "Terjadi kesalahan pada simpan data penggunaan ", mysqli_error($konek);
    }
}
//}
?>