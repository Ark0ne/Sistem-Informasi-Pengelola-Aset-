<?php
    include '../pengaturan/koneksi.php';
    if (isset($_POST['simpan'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $instansi = $_POST['instansi'];
        $kontak = $_POST['kontak'];           
        /*mengubah nilai tanggal lahir menjadi format dmY: 23842082 
        d = tanggal, m = urutan bulan, Y = 4 digit tahun 
        Setelah diubah format, tanggal tersebut di enkripsi dengan fungsi md5
        */
        $password = md5 ($kontak); 
        //query untuk mengambil id user terakhir
        $exe = mysqli_query($konek, "select id_user from user order by id_user desc"); 
        if (mysqli_num_rows($exe) > 0) { 
            //bila data di tabel user sudah ada 
            $exe = mysqli_fetch_array($exe); 
            $idUser = $exe['id_user'] + 1; //ambil id user terakhir ditambah 1
        } else {
            $idUser = 1;
        }
        //query memasukan data ke tabel user yang nilai username diambil dari nis, password dari tanggal lahir 
        $sql = "insert into user values ('$idUser', '$nip', '$password', 'koordinator')";
        if (mysqli_query($konek, $sql)) {
            //query memasukan data ke tabel guru
            $sql = "insert into koordinator 
            (id_koordinator, nip_koordinator, nama_koordinator, instansi_koordinator, kontak_koordinator, id_user)
            values ('', '$nip', '$nama', '$instansi', '$kontak', '$idUser')";
            mysqli_query($konek, $sql);
            echo "<script> alert('Data Koordinator berhasil disimpan!');</script>";
            echo '<meta http-equiv="refresh" content="0; url=data_koordinator.php">';
        } else {            
            echo 'Terjadi kesalahan pada simpan koordinator: ' . mysqli_error($konek);
        }
    }
