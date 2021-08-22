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
          <div class="row">
            <?php 
                $data = $koneksi->query("SELECT * FROM katalog");
                while ($row = $data->fetch_array()) {
            ?>
              <div class="col-lg-3 col-6">
                <div class="card">
                  <a href="<?= base_url("assets/katalog/". $row['file']) ?>" target="_blank">
                    <img src="<?= base_url("assets/katalog/". $row['file']) ?>" class="card-img-top" alt="Tidak ada foto" style="width: 100%; height: 200px;">
                  </a>
                  <div class="card-body">
                    <h2 class="card-title text-bold"><?= $row['nama_katalog'] ?></h2>
                    <p class="card-text">
                      <table border="0">
                        <tr>
                          <td><li>Jenis</li></td>
                          <td width="30%" align="center">:</td>
                          <td><?= $row['jenis_katalog'] ?></td>
                        </tr>
                        <tr>
                          <td><li>Ukuran</li></td>
                          <td width="30%" align="center">:</td>
                          <td><?= $row['ukuran'] ?></td>
                        </tr>
                        <tr>
                          <td><li>Harga</li></td>
                          <td width="30%" align="center">:</td>
                          <td><?= $row['harga'] ?></td>
                        </tr>
                      </table>
                    </p>
                  </div>
                </div>
              </div>       
              <?php } ?>
            </div>

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