        <?php include '../pengaturan/koneksi.php' ?>
        <!--overview start-->
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-users"></i>
              <div class="count">
                <?php
                     $query_siswa = "SELECT * FROM pejabat";
                     $data_siswa = mysqli_query($konek, $query_siswa);
                     $jumlah_siswa = mysqli_num_rows($data_siswa);
                     echo "$jumlah_siswa";
                ?>
                
              </div>
              <div class="title">Jumlah Pejabat</div>
            </div>
            <!--/.info-box-->
          </div>
          <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-users"></i>
              <div class="count">
                <?php
                     $query_siswa = "SELECT * FROM koordinator";
                     $data_siswa = mysqli_query($konek, $query_siswa);
                     $jumlah_siswa = mysqli_num_rows($data_siswa);
                     echo "$jumlah_siswa";
                ?>
                
              </div>
              <div class="title">Jumlah Koordinator</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-university"></i>
              <div class="count">
                <?php
                $query_kelas = "SELECT * FROM view_aset";
                $data_kelas = mysqli_query($konek, $query_kelas);
                $jumlah_kelas = mysqli_num_rows($data_kelas);
                echo "$jumlah_kelas";
                ?>
              </div>
              <div class="title">Aset</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
    >
        </div>
        <!--/.row-->