<?php
include '../template/header.php'; 
include '../template/sidebar.php';
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12"> 
                <h3 class="page-header"><i class="fa fa fa-bars">Data Pejabat</i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Pejabat</li>
                    <li><i class="fa fa-square-o"></i>Tampil Data</li>
                </ol>
            </div> 
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Pejabat Aktif
                    </div>
                    <div class="panel-body"> 
                    <?php if($_SESSION['status']=='admin'){ ?> 
                        <a href="tambah_data.php" class="btn btn-info">Tambah Data</a>
                        <a href="cetak_data.php" target="_blank" class="btn btn-success">Cetak Data</a>
                        <?php } ?>
                         <hr>
                        <table id="tabeldata" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Pejabat</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th> 
                                    <th>Instansi</th>
                                    <th>Kontak</th>
                                                                       
                                    <?php if($_SESSION['status']=='admin') echo '<th>Aksi</th>'; ?>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php
                                include '../pengaturan/koneksi.php';
                                $cekvalidtor = mysqli_query($konek, "select * from user where status='validator'");
                                if(mysqli_num_rows($cekvalidtor)>0){
                                    $data =mysqli_fetch_array($cekvalidtor);
                                    $uservalidator = $data['username'];
                                }else{
                                    $uservalidator = '';
                                }
                                $query = "select * from pejabat";
                                $data = mysqli_query($konek, $query);
                                while ($row = mysqli_fetch_array($data)) {
                                    if($uservalidator !=  $row['nip']){
                                        $validator = "<a href='jadi_validator.php?id=$row[nip]' onclick='return confirm(\" Jadikan Validator?\");' class='btn btn-info'>Jadikan Validator</a>";
                                    } else {
                                        $validator = "<a href='#' class='btn btn-info'>validator</a>";
                                    }
                                    echo "<tr>
                                        <td>$row[id_pejabat]</td>            
                                        <td>$row[nip]</td>
                                        <td>$row[nama]</td>
                                        <td>$row[instansi]</td>
                                        <td>$row[kontak]</td>";
                                    if($_SESSION['status']=='admin'){                                        
                                        echo "<td>
                                            <div class='btn-row'>
                                                <div class='btn-group'>
                                                    <a href='ubah_data.php?id=$row[nip]' class='btn btn-warning'>Edit</a> 
                                                    <a href='aksi_hapus.php?id=$row[nip]' onclick='return confirm (\"Hapus data ini?\");'
                                                    class='btn btn-danger'>Hapus</a>".$validator."
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