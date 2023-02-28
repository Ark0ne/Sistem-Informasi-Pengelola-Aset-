<?php
include '../template/header.php';
include '../template/sidebar.php';
$id = $_GET['id']; //mengambil nilai id dari url, lalu disimpan di variabel $id
if(isset($id)){//mengecek apakah variabel $id ada nilainya 
    include '../pengaturan/koneksi.php';
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select * from view_penggunaan where id_guna = '$id'");
    //ambil data siswa dengan menggunakan variabel $row
    $row = mysqli_fetch_array($query);
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Data Pengunaan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li> 
                    <li><i class="fa fa-bars"></i>Data Penggunan</li>
                    <li><i class="fa fa-square-o"></i>Ubah Data</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"> <!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Ubah Data Pakai
                    </div><!--tutup heading panel-->
                    <div class="panel-body"> <!--bagian body/content panel-->
                        <!--
                        membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                        -->
                        <form class="form-horizontal" action="aksi_ubah.php" method="post">
                            <div class="form-group"> 
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="hidden" name="id_guna" value="<?php echo $row['id_guna']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Aset</label>
                                <div class="col-lg-8">
                                    <select name="nama_aset" class="form-control" required>
                                        <option value="">Pilih Aset</option>
                                        <?php                                        
                                        $exe = mysqli_query($konek, "select * from aset where status ='Valid'");
                                        while ($aset = mysqli_fetch_array($exe)) { 
                                            $select = '';
                                            if ($row['id_aset'] == $aset['id_aset']) $select = "selected";
                                            echo "<option value=$aset[id_aset] $select>$aset[nama_aset]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">NIP/NPWP</label>
                                <div class="col-lg-8">
                                    <!-- name nama akan dipanggil di halaman aksi -->
                                    <input type="text" name="npwp" autocomplete="off" value="<?php echo $row ['npwp']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Atas Nama</label>
                                <div class="col-lg-4">
                                    <!-- name instansi akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_pengguna" autocomplete="off" value="<?php echo $row ['atas_nama']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tipe</label>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <input type="radio" name="tipe" value="Pinjam" <?php if ($row['tipe'] == 'Pinjam') echo 'checked'; ?> class="form-check-input">
                                        <label class="form-check-label">Pinjam</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="tipe" value="Sewa" <?php if ($row['tipe'] == 'Sewa') echo 'checked'; ?> class="form-check-input">
                                        <label class="form-check-label">Sewa</label>
                                    </div>
                                </div>
                            </div>       
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Awal Pengunaan</label>
                                <div class="col-lg-6">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="awal" value="<?php echo $row ['tanggal_mulai']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Akhir</label>
                                <div class="col-lg-6">
                                    <!-- name tanggal akan dipanggil di halaman aksi -->
                                    <input type="date" autocomplete="off" name="akhir" value="<?php echo $row ['tanggal_akhir']; ?>" class="form-control" required>
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