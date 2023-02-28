<?php
include '../template/header.php';
include '../template/sidebar.php';
include '../pengaturan/koneksi.php';
$s = $_SESSION['id'];
if (isset($s)) { //mengecek apakah variabel $id ada nilainya 
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select * from koordinator where id_koordinator = '$s'");
    //ambil data siswa dengan menggunakan variabel $row
    $row = mysqli_fetch_array($query);
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Pengunaa Aset</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Penggunaan</li>
                    <li><i class="fa fa-square-o"></i>Tambah Data</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"><!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Tambah Data Pakai
                    </div><!--tutup heading panel-->
                    <div class="panel-body"><!--bagian body/content panel -->
                        <!--
                            membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                            -->
                        <form class="form-horizontal" action="aksi_tambah.php" method="post">
                        <div class="form-group">
                                <label for="nama_aset" class="col-sm-4">Aset Valid</label>
                                <div class="col-lg-8">
                                    <select name="nama_aset" class="form-control col-sm-10" required="">
                                        <option value="">Pilih Aset</option>
                                        <?php
                                        $query = mysqli_query($konek, "select * from aset inner join penggunaan on
                                        not aset.id_aset = penggunaan.id_aset and aset.status='valid'");
                                        while ($data = mysqli_fetch_array($query)) { 
                                            echo "<option value='$data[0]'>$data[nama_aset]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-4">NIP/NPWP</label>
                                <div class="col-lg-8">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="npwp" autocomplete="off" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-4">Atas Nama</label>
                                <div class="col-lg-8">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_pengguna" autocomplete="off" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tipe Pengunaan</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="radio" name="tipe" value="Pinjam" class="form-check-input">
                                        <label class="form-check-label">Pinjam</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="tipe" value="Sewa" class="form-check-input">
                                        <label class="form-check-label">Sewa</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Awal Pengunaan</label>
                                <div class="col-lg-6">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="awal" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Akhir</label>
                                <div class="col-lg-6">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="akhir" class="form-control" required>
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