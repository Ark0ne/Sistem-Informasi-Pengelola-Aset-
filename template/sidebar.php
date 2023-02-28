<!--sidebar start-->
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="../index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master Data</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">             
                <li><a class="" href="../koordinator/data_koordinator.php">Koordinator</a></li>
                <?php if($_SESSION['status'] != 'koordinator'){ ?>
                <li><a class="" href="../pejabat/data_pejabat.php">Pejabat</a></li>
                <?php } ?>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Aset</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
                <?php if($_SESSION['status'] != 'koordinator'){ ?>
                <li><a class="" href="../kategori/data_kategori.php">Kategori</a></li>
                <?php } ?>
                <?php if($_SESSION['status'] != 'pejabat'){ ?>
                <li><a class="" href="../validasi/data_aset.php">Pengajuan</a></li>
                <li><a class="" href="../pakai/data_pakai.php">Penggunaan</a></li>
                <?php } ?>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->