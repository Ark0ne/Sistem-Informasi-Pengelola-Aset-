<?php
include '../template/header.php';
include '../template/sidebar.php';
include '../pengaturan/koneksi.php';
$s = $_SESSION['id'];
if (isset($s)) { //mengecek apakah variabel $id ada nilainya 
    //ambil data  berdasarkan nip yang dipilih
    $query = mysqli_query($konek, "select * from koordinator where id_koordinator = '$s'");
    //ambil data dengan menggunakan variabel $row
    $row = mysqli_fetch_array($query);
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
                    <li><i class="fa fa-square-o"></i>Tambah Data</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-8"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"><!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Tambah Data Aset
                    </div><!--tutup heading panel-->
                    <div class="panel-body"><!--bagian body/content panel -->
                        <!--
                            membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                            -->
                        <form class="form-horizontal" action="aksi_tambah.php" method="post" enctype="multipart/form-data">
                            <div class="form-group"> <label class="col-lg-2">Nama Aset</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_aset" autocomplete="off" required class="form-control">
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
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        //
                                        $query = mysqli_query($konek, "select * from kategori");
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value='$data[0]'>$data[nama_kategori]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2">Tanggal Penambahaan</label>
                                <div class="col-lg-4">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="tanggal" class="form-control" required>
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
                                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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