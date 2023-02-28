<div class="row">

          <div class="col-lg-5 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Penggunaa Aset</strong></h2>
                <div class="panel-actions">                  
                  <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Aset</th>
                      <th>Nama Lengkap</th>
                      <th>Tipe</th>
                    </tr>
                  </thead>
                  <tbody>                      
                  <?php
                                include '../pengaturan/koneksi.php';
                                $query = "select * from view_penggunaan order by nama_aset asc";
                                $no = 1;
                                $data = mysqli_query($konek, $query);
                                while($row = mysqli_fetch_array($data)) {
                                    echo "<tr>
                                    <td>$no</td>
                                    <td>$row[nama_aset]</td>
                                    <td>$row[atas_nama]</td>
                                    <td>$row[tipe]</td>
                                    ";
                                    $no++;                                                                      
                                }
                            ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>