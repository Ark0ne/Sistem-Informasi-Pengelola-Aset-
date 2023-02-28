<?php
include '../template/header.php'; 
include '../template/sidebar.php';
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12"> 
                <h3 class="page-header"><i class="fa fa fa-bars">Data Koordinator</i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Koordinator</li>
                    <li><i class="fa fa-square-o"></i>Tampil Data</li>
                </ol>
            </div> 
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Koordinator Aktif
                    </div>
                    <div class="panel-body"> 
                    <?php if($_SESSION['status']=='pejabat'||$_SESSION['status']=='admin'){ ?> 
                        <a href="tambah_data.php" class="btn btn-info">Tambah Data</a>
                        <a href="cetak_data.php" target="_blank" class="btn btn-success">Cetak Data</a>
                        <?php } ?>
                         <hr>
                        <table id="tabeldata" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Koordinator</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th> 
                                    <th>Instansi</th>
                                    <th>Kontak</th>
                                                                       
                                    <?php if($_SESSION['status']=='admin'||$_SESSION['status']=='pejabat') echo '<th>Aksi</th>'; ?>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php
                                include '../pengaturan/koneksi.php';
                                $query = "select * from koordinator";
                                $data = mysqli_query($konek, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    echo "<tr>
                                        <td>$row[id_koordinator]</td>            
                                        <td>$row[nip_koordinator]</td>
                                        <td>$row[nama_koordinator]</td>
                                        <td>$row[instansi_koordinator]</td>
                                        <td>$row[kontak_koordinator]</td>";
                                    if($_SESSION['status']=='admin'||$_SESSION['status']=='pejabat'){                                        
                                        echo "<td>
                                            <div class='btn-row'>
                                                <div class='btn-group'>
                                                    <a href='ubah_data.php?id=$row[nip_koordinator]' class='btn btn-warning'>Edit</a> 
                                                    <a href='aksi_hapus.php?id=$row[nip_koordinator]' onclick='return confirm (\"Hapus data ini?\");'
                                                    class='btn btn-danger'>Hapus</a>"."
                                                </div>
                                            </div>
                                        </td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
include "../template/footer.php";
?>