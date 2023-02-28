<?php
include '../template/header.php';
include '../template/sidebar.php';
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars">Data Kategori</i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Kategori</a></li>
                    <li><i class="fa fa-square-o"></i>Tampil data</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Kategori Aset
                    </div>
                    <div class="panel-body">
                        <?php if($_SESSION['status']=='admin'||$_SESSION['status']=='pejabat') { ?> 
                        <a data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah Data</a>
                        <a href="cetak_data.php" target="_blank" class="btn btn-success">Cetak Data</a>
                        <?php } ?>
                        <div id="tambah" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-header">
                                    <h5 class="modal-tittle">Tambah Data Kategori</h5>
                                    <div class="modal-body">
                                        <form action="tambah_kategori.php" method="post">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nama_kategori" placeholder="Kategori">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Penambahan</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Penambahan">
                                                </div>
                                            </div>  
                                            <div class="modal-footer">
                                                <input type="submit" name="simpan" value="save" class="btn btn-primary">        
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>          
                        </div>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <?php if($_SESSION['status']=='admin'||$_SESSION['status']=='pejabat') echo '<th>Aksi</th>'; ?>
                                </tr>
                            </thead>
                            <?php
                                include '../pengaturan/koneksi.php';
                                $query = "select * from view_kategori";
                                $data = mysqli_query($konek, $query);
                                while($row = mysqli_fetch_array($data)) {
                                    echo "<tr>
                                    <td>$row[id_kategori]</td>
                                    <td>$row[nama_kategori]</td>
                                    <td>$row[tanggal]</td>
                                    <td>$row[jumlah]</td>";
                                    if($_SESSION['status']=='admin'||$_SESSION['status']=='pejabat'){                                        
                                    echo "<td>
                                        <div class='btn-row'>
                                            <div class='btn-group'>                                
                                                <a href='edit_kategori.php?id=$row[0]' class='btn btn-warning'>Edit</a>                              
                                                <a href='hapus_kategori.php?id=$row[0]' onclick='return confirm(\"Hapus data ini?\";' class='btn btn-danger'>Hapus</a>
                                            </div>
                                        </div>                                
                                    </td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </section> 
     
<?php
include '../template/footer.php';
?>