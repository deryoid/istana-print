<?php
require '../config/config.php';
require '../config/koneksi.php';
require '../config/tglindo.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../templates/head.php';


?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include '../templates/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../templates/sidebar.php';
    $proyek = $koneksi->query("SELECT * FROM proyek as p LEFT JOIN perusahaan as pr ON p.id_perusahaan = pr.id_perusahaan ORDER BY p.id_perusahaan DESC");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Catatan User</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <div class="alert alert-info" role="alert">
            <h5><b>
                <i class="fa fa-info-circle"></i>
                "Selamat Datang Di Aplikasi PT. GERAI INDAH MARABAHAN"
              </b></h5>
          </div>

          <div class="row">
          <!-- /.col -->
          <?php foreach ($proyek as $p) { ?>
          <div class="col-md-12">
            
          
            <!-- Box Comment -->
            <div class="card card-widget" >
            <?php if ($p['status_proyek'] == "Menunggu") { ?>
              <div class="card-header" style="background-color:yellow;">
                <div class="user-block">
                  <img class="img-circle" src="<?= base_url() ?>/assets/dist/img/logo_pln.jpg" alt="User Image">
                  <span class="username" ><a href="#" style="color:black;">Gerai Pln</a></span>
                  <span class="description" style="color:black;">Status: <?php echo $p['status_proyek'] ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <h3><?php echo $p['nama_perusahaan'].'/ '. $p['kode_proyek'].' '.$p['nama_proyek'];?></h3>
              <hr>
                <p><?php echo $p['ket_tunda'];?></p>
            </div>
            <!-- /.card -->
            <?php } elseif ($p['status_proyek'] == "Di Tunda") { ?>
              <div class="card-header" style="background-color:red;">
                <div class="user-block">
                  <img class="img-circle" src="<?= base_url() ?>/assets/dist/img/logo_pln.jpg" alt="User Image">
                  <span class="username" ><a href="#" style="color:white;">Gerai Pln</a></span>
                  <span class="description" style="color:white;">Status: <?php echo $p['status_proyek'] ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <h3><?php echo $p['nama_perusahaan'].'/ '. $p['kode_proyek'].' '.$p['nama_proyek'];?></h3>
              <hr>
                <p><?php echo $p['ket_tunda'];?></p>
            </div>
            <!-- /.card -->
            <?php } else { ?> 
              <div class="card-header" style="background-color:dodgerblue;">
                <div class="user-block">
                  <img class="img-circle" src="<?= base_url() ?>/assets/dist/img/logo_pln.jpg" alt="User Image">
                  <span class="username" ><a href="#" style="color:white;">Gerai Pln</a></span>
                  <span class="description" style="color:white;">Status: <?php echo $p['status_proyek'] ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <h3><?php echo $p['nama_perusahaan'].'/ '. $p['kode_proyek'].' '.$p['nama_proyek'];?></h3>
              <hr>
                <p><?php echo $p['status_jalan']." Dari tanggal ". tgl_indo($p['tgl_mulai'])." sampai dengan ".tgl_indo($p['tgl_selesai'])." dengan Biaya Rp.". $p['biaya'];?></p>
            </div>
            <!-- /.card -->
            <?php } ?>


          </div>
          <!-- /.col -->
          </div>
          <?php }?>
        </div>
        <!-- /.row -->


          <div class="col-md-12">

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include '../templates/footer.php';
    ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  <?php
  include '../templates/script.php';
  ?>
</body>

</html>

