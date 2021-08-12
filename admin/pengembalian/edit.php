<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengembalian WHERE id_pengembalian = '$id'");
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
                            <h1 class="m-0 text-dark">Status Pengembalian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pengembalian</li>
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
                                        <h3 class="card-title">Pengembalian</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                       
                                        <div class="form-group row">
                                            <label for="nama_pemesan" class="col-sm-2 col-form-label">Nama Cust</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?= $row['nama_pemesan']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?= $row['nik']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_wa" class="col-sm-2 col-form-label">No Whatsapp</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  value="<?= $row['no_wa']; ?>" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control"  value="<?= $row['tanggal_pesan']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                            <td><a href="<?= base_url(); ?>/filependukung/<?= $row['file']?>" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a></td>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih " id="status" name="status" >
                                                <option value="Menunggu Persetujuan" <?php if ($row['status'] == "Menunggu Persetujuan") {
                                                            echo "selected";
                                                            } ?>>Menunggu Persetujuan</option>
                                                <option value="Disetujui" <?php if ($row['status'] == "Disetujui") {
                                                                echo "selected";
                                                            } ?>>Disetujui</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pengembalian/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $status              = $_POST['status'];

        
        $submit = $koneksi->query("UPDATE pengembalian SET  
                            status = '$status'
                            WHERE 
                            id_pengembalian = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data pengembalian Ditambahkan";
            echo "<script>window.location.replace('../pengembalian/');</script>";
        }
    }

    ?>

</body>

</html>