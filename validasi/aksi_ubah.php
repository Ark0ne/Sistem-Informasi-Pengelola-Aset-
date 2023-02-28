<?php
include '../pengaturan/koneksi.php';
session_start();
if (isset($_POST['ubah'])) {
    $id_aset=$_POST['id_aset'];
    $tanggal = $_POST['tanggal'];
    $aset = $_POST['nama_aset']; 
    $kategori = $_POST['kategori']; 
    $gambar = $_FILES['gambar']['name'];
    $file = $_FILES['sertifikat']['name'];
    $s = $_SESSION['id'];//mengambil session id disimpan di variabel $guru
    
    //echo "<script>alert('$tanggal, $siswa, $pelanggaran, $guru');</script>"; 
    if ($_SESSION['status'] == 'validator'){//jika yang menambah data/statunya adalah kesiswaan 
        $status = 'Valid'; //variabel status bernilai Disetujui
    }else{//apabila yang menambah data pelanggaran bukan kesiswaan 
        $status = 'Belum Divalidasi'; //variabel status bernilai Diajukan
    }

    if($gambar != ""||$file !="") {
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
        $file_ekstensi    = array('pdf','docx');
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $f = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $gambar_tmp = $_FILES['gambar']['tmp_name'];   
        $f_ekstensi = strtolower(end($f));
        $ukuran   = $_FILES['sertifikat']['size'];
        $file_tmp = $_FILES['sertifikat']['tmp_name']; 
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true && in_array($f_ekstensi,$file_ekstensi)== true) {   
                if($ukuran < 1044070){
                        move_uploaded_file($gambar_tmp, '../input/gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                        move_uploaded_file($file_tmp, '../input/file/'.$file);
                        $sql = "update aset set nama_aset='$aset',id_kategori='$kategori',tanggal='$tanggal',
                        gambar='$nama_gambar_baru',file='$file', status='$status', deskripsi='Belum Divalidasi' where id_aset='$id_aset'";
                        if (mysqli_query($konek, $sql)) { 
                        echo "<script>alert('Data Aset berhasil diubah!');</script>"; 
                        echo '<meta http-equiv="refresh" content="0; url=data_aset.php">';
                         } else { 
                         echo 'Terjadi kesalahan pada simpan : ', mysqli_error($konek);
                        }
                    }
                } else {     
                   //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                      echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png dan file hanya pdf dan docx.');window.location='tambah_data.php';</script>";
                }
            }
    }
    //query menambahkan data ke tabel pelanggaran
?>