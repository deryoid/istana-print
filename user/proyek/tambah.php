<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                            <h1 class="m-0 text-dark">Proyek</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Proyek</li>
                                <li class="breadcrumb-item active">Proyek</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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
                                                <input type="text" class="form-control" id="kode_proyek" name="kode_proyek">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_proyek" class="col-sm-2 col-form-label">Nama Proyek</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_proyek" name="nama_proyek">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_perusahaan" class="col-sm-2 col-form-label">Perusahaan yang Menaungi</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih" id="id_perusahaan" name="id_perusahaan">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM perusahaan ORDER BY id_perusahaan ASC");
                                                    while ($dsn = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dsn['id_perusahaan'] ?>"><?= $dsn['nama_perusahaan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="alamat_proyek" class="col-sm-2 col-form-label">Alamat Proyek</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3" name="alamat_proyek"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="estimasi" class="col-sm-2 col-form-label">Estimasi Pengerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="estimasi" name="estimasi">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/proyek/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
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
        $kode_proyek        = $_POST['kode_proyek'];
        $nama_proyek        = $_POST['nama_proyek'];
        $id_perusahaan      = $_POST['id_perusahaan'];
        $alamat_proyek      = $_POST['alamat_proyek'];
        $estimasi           = $_POST['estimasi'];

        $submit = $koneksi->query("INSERT INTO proyek VALUES (
            NULL,
            '$kode_proyek',
            '$nama_proyek',
            '$id_perusahaan',
            '$alamat_proyek',
            '$estimasi',
            'Menunggu',
            NULL,
            NULL,
            NULL,
            NULL
            )");

        if ($submit) {

            $_SESSION['pesan'] = "Data Proyek Ditambahkan";
            echo "<script>window.location.replace('../proyek/');</script>";
        }
    }
    ?>


</body>

</html>