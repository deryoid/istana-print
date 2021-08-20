<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM karyawan WHERE id_karyawan = '$id'");
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
                            <h1 class="m-0 text-dark">Ubah Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Karyawan</li>
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
                                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $row['nama_karyawan']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_katalog" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="jk" class="form-control" required>
                                                <option value="Laki-laki" <?= $row['jk'] == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= $row['jk'] == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $row['tempat_lahir']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $row['tgl_lahir']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <select name="agama" class="form-control" required>
                                                <option value="Islam" <?= $row['agama'] == "Islam" ? "selected" : "" ?>>Islam</option>
                                                <option value="Kristen" <?= $row['agama'] == "Kristen" ? "selected" : "" ?>>Kristen</option>
                                                <option value="Budha" <?= $row['agama'] == "Budha" ? "selected" : "" ?>>Budha</option>
                                                <option value="Hindu" <?= $row['agama'] == "Hindu" ? "selected" : "" ?>>Hindu</option>
                                                <option value="Katolik" <?= $row['agama'] == "Katolik" ? "selected" : "" ?>>Katolik</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pendidikan" value="<?= $row['pendidikan']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jurusan" value="<?= $row['jurusan']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="alamat" value="<?= $row['alamat']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">No Hp</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="hp" value="<?= $row['hp']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Bidang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $row['bidang']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_katalog" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jabatan" value="<?= $row['jabatan']; ?>">
                                        </div>
                                    </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/karyawan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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

        $submit = $koneksi->query("UPDATE karyawan SET  
                            nama_karyawan = '$nama_karyawan',
                            jk            = '$jk',
                            tempat_lahir  = '$tempat_lahir',
                            tgl_lahir     = '$tgl_lahir',
                            agama         = '$agama',
                            pendidikan    = '$pendidikan',
                            jurusan       = '$jurusan',
                            alamat        = '$alamat',
                            hp            = '$hp',
                            bidang        = '$bidang',
                            jabatan       = '$jabatan'
                            WHERE 
                            id_karyawan = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Karyawan Diubah";
            echo "<script>window.location.replace('../karyawan/');</script>";
        }
    }

    ?>

</body>

</html>