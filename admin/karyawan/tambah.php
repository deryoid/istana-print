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
                            <h1 class="m-0 text-dark">Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Karyawan</li>
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
                                <div class="card card-red">
                                    <div class="card-header">
                                        <h3 class="card-title">Karyawan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="nama_katalog" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <label for="nama_katalog" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="jk" class="form-control" required>
                                                <option value="" disabled selected>--Pilih--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tempat_lahir" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="tgl_lahir" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <select name="agama" class="form-control" required>
                                                <option value="" selected disabled>--Pilih--</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Katolik">Katolik</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pendidikan" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jurusan" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">No Hp</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="hp" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Bidang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bidang" name="bidang" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jabatan" required>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/karyawan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_karyawan = $_POST['nama_karyawan'];
        $jk            = $_POST['jk'];
        $tempat_lahir  = $_POST['tempat_lahir'];
        $tgl_lahir     = $_POST['tgl_lahir'];
        $agama         = $_POST['agama'];
        $pendidikan    = $_POST['pendidikan'];
        $jurusan       = $_POST['jurusan'];
        $alamat        = $_POST['alamat'];
        $hp            = $_POST['hp'];
        $bidang        = $_POST['bidang'];
        $jabatan       = $_POST['jabatan'];


        $submit = $koneksi->query("INSERT INTO karyawan VALUES (
            NULL,
            '$nama_karyawan',
            '$jk',
            '$tempat_lahir',
            '$tgl_lahir',
            '$agama',
            '$pendidikan',
            '$jurusan',
            '$alamat',
            '$hp',
            '$bidang',
            '$jabatan'
            )");

        if ($submit) {

            $_SESSION['pesan'] = "Data Karyawan  Ditambahkan";
            echo "<script>window.location.replace('../karyawan/');</script>";
        }
    }
    ?>


</body>

</html>