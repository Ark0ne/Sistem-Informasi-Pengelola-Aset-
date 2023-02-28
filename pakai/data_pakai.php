<?php
include '../template/header.php'; 
include '../template/sidebar.php';
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12"> 
                <h3 class="page-header"><i class="fa fa fa-bars">Data Penggunaan</i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Penggunaan</li>
                    <li><i class="fa fa-square-o"></i>Tampil Data</li>
                </ol>
            </div> 
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        Data Pakai Aset
                    </div>
                    <div class="panel-body"><!--bagian body/content panel-->
                        
                       <?php if ($_SESSION['status'] == 'koordinator' ) {?>
                            <a href='tambah_data.php' class='btn btn-success'>Tambah Data</a>
                            
                        <?php } else if ($_SESSION['status'] == 'admin'||$_SESSION['status'] == 'validator') { ?>
                            <form action="cetak_data.php" method="post" target="blank">
                            <div class="col-lg-2">
                                    <select name="cbcetak" class="form-control col-sm-10" required="">
                                        <option value="seluruh">Semua</option>
                                        <option value="Pinjam">Pinjam</option>
                                        <option value="Sewa">Sewa</option>
                                    </select>
                                </div>
                                <button type="submit" name="cetak" class="btn btn-success">Cetak Data</button>
                        <?php } ?>
                         <hr>
                        <table id="tabeldata" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Aset</th>
                                    <th>NPWP/NIP</th>
                                    <th>Nama Pengguna</th>
                                    <th>Status</th>
                                    <th>Tanggal Awal</th>
                                    <th>Akhir</th>                            
                                    <?php if($_SESSION['status']=='admin'||$_SESSION['status']=='koordinator') echo '<th>Aksi</th>'; ?>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php
                                include '../pengaturan/koneksi.php';
                                $query = "select id_guna, nama_aset, npwp, atas_nama, tipe, tanggal_mulai,
                                tanggal_akhir from view_penggunaan";
                                $data = mysqli_query($konek, $query);
                                $no = 1;
                                while ($row = mysqli_fetch_array($data)) {
                                    echo "<tr>
                        <td>$no</td>
                        <td>$row[nama_aset]</td>
                        <td>$row[npwp]</td>
                        <td>$row[atas_nama]</td>
                        <td>$row[tipe]</td>
                        <td>" . date("d-F-Y", strtotime($row['tanggal_mulai'])) . "</td>
                        <td>" . date("d-F-Y", strtotime($row['tanggal_akhir'])) . "</td>
                        ";
                        if($_SESSION['status']=='koordinator'||$_SESSION['status']=='admin'){                                        
                        echo "
                        <td>
                        <div class='btn-row'>
                        <div class='btn-group'>
                            <a href='ubah_data.php?id=$row[id_guna]' class='btn btn-warning'>Edit</a>"; 
                            if($_SESSION['status'] == 'admin') {
                                echo "<a href='aksi_hapus.php?id=$row[id_guna]' onclick='return confirm (\"Hapus data ini?\");'
                                class='btn btn-danger'>Hapus</a>"; 
                                }"
                        </div>
                        </div>
                        </td>";
                        }
                        echo "</tr>";
                        $no++;
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