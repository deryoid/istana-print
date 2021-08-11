<?php
require '../../config/config.php';
require '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM proyek WHERE id_proyek = '$id'");
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
                            <h1 class="m-0 text-dark">Ubah Proyek</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Proyek</li>
                                <li class="breadcrumb-item active">Proyek</li>
                                <li class="breadcrumb-item active">Ubah Data</li>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Proyek</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">



                                        <div class="form-group row">
                                            <label for="kode_proyek" class="col-sm-2 col-form-label">Kode Proyek</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kode_proyek" value="<?= $row['kode_proyek'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_proyek" class="col-sm-2 col-form-label">Nama Proyek</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_proyek" value="<?= $row['nama_proyek'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="estimasi" class="col-sm-2 col-form-label">Estimasi Pengerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="estimasi" value="<?= $row['estimasi'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= $row['tgl_mulai'] ?>">
                                            </div>
                                            <label for="tgl_selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $row['tgl_selesai'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/perusahaan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Tambah Tanggal Pengerjaan</i></button>
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
        $tgl_mulai        = $_POST['tgl_mulai'];
        $tgl_selesai        = $_POST['tgl_selesai'];



        $submit = $koneksi->query("UPDATE proyek SET  
                            tgl_mulai = '$tgl_mulai',
                            tgl_selesai = '$tgl_selesai',
                            status_jalan = 'Di Jalankan'
                            WHERE 
                            id_proyek = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Proyek Diubah";
            echo "<script>window.location.replace('../proyekdisetujui/');</script>";
        }
    }

    ?>

</body>

</html>