<aside class="main-sidebar sidebar-light-green elevation-4">
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/istana-print.png" style="width: 30px;" alt="#" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Istana Print</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 d-flex">
      <!-- <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <div class="info">
        <a href="#" class="d-block">
          <i>
            <?php
            if ($_SESSION['role'] == "Super Admin") {
              echo "Super Admin";
            } elseif ($_SESSION['role'] == "Kepala") {
              echo "Kepala";
            } elseif ($_SESSION['role'] == "User") {
              echo "User";
            } 
            ?>
          </i>
        </a>
      </div>
    </div>




    <?php if ($_SESSION['role'] == "Super Admin") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/karyawan') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Karyawan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/katalog') ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Katalog
              </p>
            </a>
          </li>
          


          <div class="dropdown-divider"></div>
          
          <li class="nav-item">
            <a href="<?= base_url('admin/pemesanan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Pemesanan
              </p>
            </a>
          </li>
         
          <div class="dropdown-divider"></div>

          <li class="nav-item">
            <a href="<?= base_url('admin/pengerjaan/') ?>" class="nav-link">
              <i class="nav-icon fas fa-spinner"></i>
              <p>
                Pengerjaan
              </p>
            </a>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item">
            <a href="<?= base_url('admin/selesai/') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Selesai & Pengambilan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pengembalian/') ?>" class="nav-link">
              <i class="nav-icon fas fa-undo-alt"></i>
              <p>
                Pengembalian
              </p>
            </a>
          </li>

          <div class="dropdown-divider"></div>
          <li class="nav-item">
            <a href="<?= base_url('admin/printrekap') ?>"  target="blank" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Rekap Data Keseluruhan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php } elseif ($_SESSION['role'] == "Kepala") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('kepala/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kepala/laporan/lap_jenisbarang') ?>" target="blank" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Jenis Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kepala/laporan/lap_satuanbarang') ?>" target="blank" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Satuan Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kepala/laporan/lap_perusahaan') ?>" target="blank" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Perusahaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kepala/laporan/lap_proyek') ?>" target="blank" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Proyek
              </p>
            </a>
          </li>






        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } elseif ($_SESSION['role'] == "User") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('user/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/proyekdijalankan/') ?>" class="nav-link">
              <i class="nav-icon fas fa-hard-hat"></i>
              <p>
                Proyek Yang Berjalan
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } ?>
  </div>
  <!-- /.sidebar -->
</aside>