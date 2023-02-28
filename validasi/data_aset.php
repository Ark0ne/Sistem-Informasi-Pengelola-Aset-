<?php
include '../template/header.php';
include '../template/sidebar.php';
$s = $_SESSION['id'];
if (isset($s)) { //mengecek apakah variabel $id ada nilainya 
    include '../pengaturan/koneksi.php';
    //ambil data siswa berdasarkan nis yang dipilih
    $query = mysqli_query($konek, "select * from view_asset where id_koordinator = '$s'");
    //ambil data siswa dengan menggunakan variabel $row
    $kordinator = mysqli_fetch_array($query);
}
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Data Validasi Pengajuan Asset</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../dashboard/dashboard.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Data Validasi</li>
                    <li><i class="fa fa-square-o"></i>Tampil Data</li>
                </ol>
            </div>
        </div>
        <!--page start-->
        <div class="row">
            <div class="col-lg-12"><!--ukuran panel, angka 12 bisa diganti 6, 8, 10 -->
                <div class="panel"><!-- membuat panel-->
                    <div class="panel-heading"> <!--bagian heading panel-->
                        Data Validasi Pengajuan Aset
                        <?php echo ', ', $_SESSION['id'], ', ', $_SESSION['status']; ?>
                    </div><!--tutup heading panel-->
                    <div class="panel-body"><!--bagian body/content panel-->
                    
                        
                       <?php if ($_SESSION['status'] == 'koordinator' ) {?>
                            <a href='tambah_data.php' class='btn btn-success'>Tambah Data</a>
                            
                        <?php } else if ($_SESSION['status'] == 'admin'||$_SESSION['status'] == 'validator') { ?>
                            <form action="cetak_data.php" method="post" target="blank">
                            <div class="col-lg-2">
                                    <select name="cbcetak" class="form-control col-sm-10" required="">
                                        <option value="seluruh">Semua</option>
                                        <option value="Valid">Valid</option>
                                        <option value="Tidak Valid">Tidak Valid</option>
                                        <option value="Belum Divalidasi">Belum Divalidasi</option>
                                    </select>
                                </div>
                                    <button type="submit" name="cetak" class="btn btn-success">Cetak Data</button>
                            
                        <?php } ?>
                        <hr>
                        <!--
                        membuat tabel dengan class tabel hover. Akan aktif saat cursor diarahkan ke data 
                        class lainnya yang bisa diterapkan: table-striped, table-bordered
                        -->
                        <table id="tabeldata" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aset</th>
                                    <?php if ($_SESSION['status'] == 'validator' || $_SESSION['status'] == 'admin') {
                                        echo '<th>NIP koordinator</th>';
                                        echo '<th>Nama koordinator</th>';
                                    } ?>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <?php if ($_SESSION['status'] == 'validator' || $_SESSION['status'] == 'admin'||$_SESSION['status'] == 'koordinator') {
                                        echo '<th>Aksi</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../pengaturan/koneksi.php'; //panggil file koneksi 
                                if ($_SESSION['status'] == 'koordinator' ) {
                                $query = "select id_aset, nama_aset, nama_kategori, tanggal, status, 
                                deskripsi from view_aset where id_koordinator='$s'"; 
                                } else if ($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'validator'){
                                $query = "select id_aset, nama_aset, nip_koordinator, nama_koordinator,
                                nama_kategori, tanggal, status, deskripsi from view_aset order by tanggal desc";
                                }
                                $data = mysqli_query($konek, $query); //menjalankan query
                                $no = 1;
                                while ($row = mysqli_fetch_array($data)) { //mysqli_fetch_assoc(nama kolom), mysqli_fetch_row[index kolom]
                                    //format tampilan tanggal. d: tanggal, M: nama bulan 3 huruf, Y: tahun 4 digit
                                    echo "<tr>
                                <td>$no</td>
                                <td>$row[nama_aset]</td>";
                                if ($_SESSION['status'] == 'validator' || $_SESSION['status'] == 'admin') {
                                echo "<td>$row[nip_koordinator]</td>";
                                echo "<td>$row[nama_koordinator]</td>";}
                                echo "<td>$row[nama_kategori]</td>
                                <td>" . date("d-M-Y", strtotime($row['tanggal'])) . "</td>
                                <td>$row[status]</td>
                                <td>$row[deskripsi]</td>";
                                    if ($_SESSION['status'] == 'validator' || $_SESSION['status'] == 'admin') { //jika status pengguna kesiswaan
                                        echo "<td>
                                            <div class='btn-row'>
                                                <div class='btn-group'>
                                                    <a href='validasi.php?id=$row[id_aset]' class='btn btn-warning'>Lihat</a>
                                                   "; if($_SESSION['status'] == 'admin') {
                                                    echo "<a href='aksi_hapus.php?id=$row[id_aset]' class='btn btn-danger'>Hapus</a>";
                                                    }"
                                                </div>
                                            </div>
                                        </td>";
                                        echo "</tr>";
                                    } else if ($_SESSION['status'] == 'koordinator' || $_SESSION['status'] == 'admin') {
                                        echo "<td>
                                    <div class='btn-row'>
                                        <div class='btn-group'>
                                            <a href='ubah_data.php?id=$row[id_aset]' class='btn btn-warning'>Edit</a>
                                        </div>
                                    </div>
                                </td>";
                                        echo "</tr>";
                                    }
                                    echo "</tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!--tutup body panel-->
                </div><!--tutup div panel-->
            </div><!--tutup div col-->
        </div><!--tutup div row-->
        <!-- page end-->
    </section>

    <?php
    include '../template/footer.php';
    ?>