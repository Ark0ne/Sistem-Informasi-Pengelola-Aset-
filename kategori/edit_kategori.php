<?php
    include '../template/header.php';
    include '../template/sidebar.php';
    include '../pengaturan/koneksi.php'; 
    if(isset($_POST['edit'])){
        $id_kategori = $_GET['id'];
        $nama_kategori = $_POST['nama_kategori'];
        $tanggal = $_POST['tanggal'];
        $q = mysqli_query($konek, "update kategori set nama_kategori='$nama_kategori',tanggal='$tanggal' where id_kategori='$id_kategori'");
        if($q){
            echo "<script> alert('Data berhasil diperbaharui'); </script>"; 
            echo '<meta http-equiv="refresh" content="1; url=data_kategori.php">';
        }else{ 
            echo mysqli_error($konek);
        }
    }else{
        $id_kategori = $_GET['id'];
        $q = mysqli_query($konek, "select * from kategori where id_kategori='$id_kategori'"); 
        $row = mysqli_fetch_row($q);
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
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group"> 
                                <label class="col-lg-4">Kategori</label>
                                <div class="col-lg-8">
                                    <!-- name nip akan dipanggil di halaman aksi -->
                                    <input type="text" name="nama_kategori" autocomplete="off" value="<?php echo $row [1]; ?>" required class="form-control" placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4">Tanggal Penambahan</label>
                                <div class="col-lg-8">
                                    <!-- name alamat akan dipanggil di halaman aksi -->
                                    <input type="date" name="tanggal" autocomplete="off" value="<?php echo $row [2]; ?>" required class="form-control" placeholder="Tanggal Penambahan">
                                </div>
                            </div>                                                
                            <div class="form-group">
                                <div class="col-offsets-4 col-lg-2">
                                    <!-- name simpan akan dipanggil di halaman aksi -->
                                    <button type="submit" name="edit" class="btn btn-success">Ubah</button>
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
    }
?>