<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan AS p
LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog
LEFT JOIN pelanggan AS pl ON p.id_pelanggan = pl.id_pelanggan
WHERE id_pemesanan = '$id'");
$row  = $data->fetch_array();
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Selesai & Pengambilan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Selesai & Pengambilan</li>
                                <li class="breadcrumb-item active">Detail Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-red">
                                    <div class="card-header">
                                        <h3 class="card-title">Selesai & Pengambilan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                       
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" readonly value="<?= $row['tanggal_pesan'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?= $row['id_pelanggan'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pimpinan" class="col-sm-2 col-form-label"> Katalog</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?= $row['nama_katalog'] ?> - Ukuran : <?= $row['ukuran'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                            <a href="<?= base_url(); ?>/filependukung/<?= $row['file']?>" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Status Pengambilan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status_pengambilan" required>
                                                    <option value="" disabled>--Pilih--</option>
                                                    <option value="Belum Diambil" <?= $row['status_pengambilan'] == "Belum Diambil" ? "selected" : "" ?>>Belum Diambil</option>
                                                    <option value="Sudah Diambil" <?= $row['status_pengambilan'] == "Sudah Diambil" ? "selected" : "" ?>>Sudah Diambil</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/selesai/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Ubah</i></button>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>

                            </div>
                            <!--/.col (left) -->
                        </div>

                    </form>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>


    <?php
    if (isset($_POST['submit'])) {
        $status_pengambilan        = $_POST['status_pengambilan'];

  

        $submit = $koneksi->query("UPDATE pemesanan SET  
                            status_pengambilan = '$status_pengambilan'
                            WHERE 
                            id_pemesanan = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Selesai Ditambahkan";
            echo "<script>window.location.replace('../selesai/');</script>";
        }
    }

    ?>

</body>

</html>