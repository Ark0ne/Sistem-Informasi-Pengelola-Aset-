<?php
include '../template/header.php';
include '../template/sidebar.php';
$id = $_GET['id']; //mengambil nilai id dari url, lalu disimpan di variabel $id
if(isset($id)){//mengecek apakah variabel $id ada nilainya 
    include '../pengaturan/koneksi.php';
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select id_aset, nama_aset, nip_koordinator, nama_koordinator,
    nama_kategori, tanggal, gambar, file status from view_aset where id_aset = '$id'");
    //ambil data siswa dengan menggunakan variabel $row
    $row = mysqli_fetch_array($query);
    $idkategori = mysqli_query($konek, "select * from aset where id_aset='$id'");
    $kat = mysqli_fetch_array($idkategori);
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Pengajuan Aset</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Pengajuan</li>
                    <li><i class="fa fa-square-o"></i>Ubah Data</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-8"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"><!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Ubah Data Aset
                    </div><!--tutup heading panel-->
                    <div class="panel-body"><!--bagian body/content panel -->
                        <!--
                            membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                            -->
                        <form class="form-horizontal" action="aksi_ubah.php" method="post" enctype="multipart/form-data">
                            <div class="form-group"> 
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="hidden" name="id_aset" value="<?php echo $row['id_aset']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Nama Aset</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_aset" value="<?php echo $row['nama_aset']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">NIP</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nip" autocomplete="off" value="<?php echo $row['nip_koordinator']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Nama</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_koordinator" autocomplete="off" value="<?php echo $row['nama_koordinator']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori" class="col-lg-2">Kategori</label>
                                <div class="col-lg-6">
                                    <select name="kategori" class="form-control col-sm-10" required="">
                                        <option value="">Pilih Kelas</option>
                                        <?php                                        
                                        $exe = mysqli_query($konek, "select * from kategori");
                                        while ($kategori = mysqli_fetch_array($exe)) { 
                                            $select = '';
                                            if ($kat['id_kategori'] == $kategori['id_kategori']) $select = "selected";
                                            echo "<option value=$kategori[id_kategori] $select>$kategori[nama_kategori]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2">Tanggal Penambahaan</label>
                                <div class="col-lg-4">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="tanggal" value="<?php echo $row['tanggal']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Gambar</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="file" name="gambar" autocomplete="off" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">File</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="file" name="sertifikat" autocomplete="off" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-offsets-4 col-lg-2">
                                    <!-- name simpan akan dipanggil di halaman aksi -->
                                    <button type="submit" name="ubah" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div><!--tutup body panel-->
                </div><!--tutup div panel-->
            </div><!--tutup div col-->
        </div><!--tutup div now-->
        <!-- page end-->
    </section>

    <?php
    include '../template/footer.php';
    ?>