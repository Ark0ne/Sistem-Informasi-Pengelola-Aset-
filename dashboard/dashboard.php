<?php
    include '../template/header.php';
    include '../template/sidebar.php';
?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <?php 
         include '../template/overview.php';
         include '../template/view_kategori.php';
         include '../template/view_penggunaan.php';
        ?>                
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

<?php
include '../template/footer.php';
?>