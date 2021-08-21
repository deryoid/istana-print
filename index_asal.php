<?php
require 'config/config.php';
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include 'templates_public/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include 'templates_public/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include 'templates_public/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Katalog</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Katalog </li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

        <!-- <div class="alert alert-info" role="alert">
            <h5><b>
            <i class="fa fa-info-circle"></i>
                "Selamat Datang Di Aplikasi Pelayanan Terpadu Gambut Online Kecamatan Gambut"</marquee> 
              </b></h5>
          </div> -->

          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                          <?php
                          if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                          ?>
                              <div class="alert alert-success alertinfo" role="alert">
                                  <h1 class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></h1>
                              </div>
                          <?php
                              $_SESSION['pesan'] = '';
                          }
                          ?>
                  
                <div class="row">
                <?php 
                $data = $koneksi->query("SELECT * FROM katalog");
                while ($row = $data->fetch_array()) {
                ?>
                <div class="col-lg-4 col-6">
                  <div class="small-box bg-danger">
                    <div class="inner">
                    
                      <p> 
                      <h4><u><?= $row['nama_katalog'] ?></u></h4>
                      <ul>
                        <li>Jenis Katalog : <?= $row['jenis_katalog'] ?></li>
                        <li>Qty : <?= $row['qty'] ?></li>
                        <li>Ukuran : <?= $row['ukuran'] ?></li>
                        <li>Harga : <?= $row['harga'] ?></li>
                      </ul>
                      </p>
                    </div>
                    
                    <div class="icon">
                    
                    </div>
                  </div>
                </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>



          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include 'templates_public/footer.php';
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
  include 'templates_public/script.php';
  ?>
</body>

</html>