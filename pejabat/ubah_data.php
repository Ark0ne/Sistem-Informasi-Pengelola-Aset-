<?php
include '../template/header.php';
include '../template/sidebar.php';
$id = $_GET['id']; //mengambil nilai id dari url, lalu disimpan di variabel $id
if(isset($id)){//mengecek apakah variabel $id ada nilainya 
    include '../pengaturan/koneksi.php';
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select * from pejabat where nip = '$id'");
    //ambil data siswa dengan menggunakan variabel $row
    $row = mysqli_fetch_array($query);
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Data Pejabat</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li> 
                    <li><i class="fa fa-bars"></i>Data Pejabat</li>
                    <li><i class="fa fa-square-o"></i>Ubah Data</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"> <!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Tambah Data Pejabat
                    </div><!--tutup heading panel-->
                    <div class="panel-body"> <!--bagian body/content panel-->
                        <!--
                        membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                        -->
                        <form class="form-horizontal" action="aksi_ubah.php" method="post">
                            <div class="form-group"> 
                                <label class="col-lg-4">NIP</label>
                                <div class="col-lg-8">
                                    <!-- name nip akan dipanggil di halaman aksi -->
                                    <input type="text" name="nip" autocomplete="off" value="<?php echo $row ['nip']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Nama Lengkap</label>
                                <div class="col-lg-8">
                                    <!-- name nama akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama" autocomplete="off" value="<?php echo $row ['nama']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Instansi</label>
                                <div class="col-lg-4">
                                    <!-- name instansi akan dipanggil di halaman aksi -->
                                    <input type="text" name="instansi" autocomplete="off" value="<?php echo $row ['instansi']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Kontak</label>
                                <div class="col-lg-8">
                                    <!-- name alamat akan dipanggil di halaman aksi -->
                                    <input type="text" name="kontak" autocomplete="off" value="<?php echo $row ['kontak']; ?>" required class="form-control">
                                </div>
                            </div>                                                
                            <div class="form-group">
                                <div class="col-offsets-4 col-lg-2">
                                    <!-- name simpan akan dipanggil di halaman aksi -->
                                    <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div><!--tutup body panel-->
                </div><!--tutup div panel-->
            </div><!--tutup div col-->
        </div><!--tutup div row-->
    <!--end page-->
    </section>

<?php
include '../template/footer.php';
?>