<?php
include '../pengaturan/koneksi.php';
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_kategori'];
    $tanggal = $_POST['tanggal'];
    $query = "insert into kategori(nama_kategori, tanggal) values ('$nama','$tanggal')";
    if(mysqli_query($konek, $query)){
        echo "<script>alert('Data Kategori berhasil disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=data_kategori.php'>";
    } else {
        echo "Terjadi kesalahan pada simpan data kelas ", mysqli_error($konek);
    }
}
?>