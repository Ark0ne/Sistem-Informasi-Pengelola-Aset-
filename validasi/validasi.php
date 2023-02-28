<?php
include '../template/header.php';
include '../template/sidebar.php';
include '../pengaturan/koneksi.php';
include '../pengaturan/koneksi.php';
$id = $_GET['id']; //mengambil nilai id dari url, lalu disimpan di variabel $id
if(isset($id)){//mengecek apakah variabel $id ada nilainya 
    include '../pengaturan/koneksi.php';
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select id_aset, nama_aset, nip_koordinator, nama_koordinator,
    nama_kategori, tanggal, gambar, file, status, deskripsi from view_aset where id_aset = '$id'");
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
                <h3 class="page-header"><i class="fa fa fa-bars"></i>Data Aset</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Aset</li>
                    <li><i class="fa fa-square-o"></i>Validasi</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"><!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Validasi Data
                    </div><!--tutup heading panel-->
                    <div class="panel-body"><!--bagian body/content panel -->
                        <!--
                            membuat form yang prosesnya akan dilakukan di halaman aksi tambah.php
                            -->
                        <form class="form-horizontal" action="status_validasi.php" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="id_aset" autocomplete="off" value="<?php echo $row['id_aset']; ?>" required class="form-control" readonly>
                            <div class="form-group"> <label class="col-lg-2">Nama Aset</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_aset" autocomplete="off" value="<?php echo $row['nama_aset']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">NIP</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <input type="text" name="nip" autocomplete="off" value="<?php echo $row['nip_koordinator']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Nama Koordinator</label>
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
                                    <input type="date" autocomplete="off" value="<?php echo $row['tanggal']; ?>" required class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Gambar</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <td style="text-align: center;"><a href="../input/gambar/<?php echo $row['gambar']; ?>" target="_blank"><img src="../input/gambar/<?php echo $row['gambar']; ?>" width="400" height="200"></a></td>
                                </div>
                            </div>
                            <div class="form-group"> <label class="col-lg-2">Keterangan</label>
                                <div class="col-lg-6">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <textarea name="deskripsi" cols="53" rows="5" required placeholder="Keterangan Validasi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                <?php
                                if($_SESSION['status'] == 'validator'||$_SESSION['status']=='admin'){
                                if($kat['status']=='Belum Divalidasi'){//jika status pelanggaran diajukan 
                                       /* echo "<td>
                                            <div class='btn-row'>
                                            <div class='btn-group'>
                                            <a href='status_validasi.php?id=$row[id_aset]&status=Valid' onclick='return confirm(\"Konfirmasi Valid?\");' class='btn btn-lg btn-primary'>Valid</a>
                                            <a href='status_validasi.php?id=$row[0]&status=Tidak Valid' onclick='return confirm(\"Konfirmasi Tidak Valid?\");'class='btn btn-lg btn-danger'>Tidak Valid</a>
                                            </div>
                                            </div>
                                            </td>";*/  ?>
                                        
                                            <!-- name simpan akan dipanggil di halaman aksi -->
                                            <button type="submit" name="valid" value="Valid" class="btn btn-lg btn-primary">Valid</button>
                                            <button type="submit" name="tidakvalid" value="Tidak Valid" class="btn btn-lg btn-danger">Tidak Valid</button>
                                        
                                    <?php }
                                    else{
                                    echo "<td>&nbsp;</td>";
                                    } 
                                }?>
                                </div>
                            </div>
                        </form>
                    </div><!--tutup body panel-->
                </div><!--tutup div panel-->
            </div><!--tutup div col-->
            <div class="col-lg-6"> 
            <div class="panel"><!-- membuat panel-->
            <div class="panel-heading"> <!--bagian heading panel--> </div>
            <div class="panel-body" style="height: 800px"> <!--bagian heading panel-->   
            <div><label class="col-lg-2">File</label>
                            <div class="col-lg-5">
                                    <!-- name aset akan dipanggil di halaman aksi -->
                                    <td><a href="../input/file/<?php echo $kat['file'];?>" target="_blank">Lihat File</a></td> 
                                    <embed src="../input/file/<?php echo $kat['file'];?>" type="application/pdf" width="220%" height="700px"></embed>
                            </div>
            </div>
            </div>
            
            </div>
            </div>
        </div><!--tutup div now-->
        <!-- page end-->
    </section>

    <?php
    include '../template/footer.php';
    ?>