<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM produk_gagal AS pg
                        LEFT JOIN pemesanan AS pm ON pg.id_pemesanan = pm.id_pemesanan
                        LEFT JOIN pelanggan AS pl ON pm.id_pelanggan = pl.id_pelanggan
                        LEFT JOIN katalog AS k ON pm.id_katalog = k.id_katalog
                        WHERE id_pg = '$id'")->fetch_array();

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
                            <h1 class="m-0 text-dark">Produk Gagal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Produk Gagal</li>
                                <li class="breadcrumb-item active">Edit Data</li>
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
                                        <h3 class="card-title">Produk Gagal</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID Pemesanan</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" readonly required value="<?= $data['id_pemesanan'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tanggal_pesan" readonly value="<?= $data['tanggal_pesan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pelanggan" readonly value="<?= $data['nama_pelanggan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Katalog Dipesan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_katalog" readonly value="<?= $data['nama_katalog']. ' - Ukuran ' .$data['ukuran'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <a href="<?= base_url(); ?>/filependukung/<?= $data['file']?>" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipe Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tipe_pembayaran" readonly value="<?= $data['tipe_pembayaran'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Bayar</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_bayar" readonly value="<?= $data['status_bayar'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Pengerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_pengerjaan" readonly value="<?= $data['status_pengerjaan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Pengambilan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_pengambilan" readonly value="<?= $data['status_pengambilan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea name="keterangan" rows="3" class="form-control" required><?= $data['keterangan'] ?></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/produk-gagal/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
            </div>
        </div>
    <!-- /.modal-dialog1 -->

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
        $keterangan   = $_POST['keterangan'];

        $submit = $koneksi->query("UPDATE produk_gagal SET keterangan   = '$keterangan'  WHERE id_pg  = '$id' ");

        if ($submit) {
            $_SESSION['pesan'] = "Data Produk Gagal Diubah";
            echo "<script>window.location.replace('../produk-gagal/');</script>";
        }
    }
    ?>


</body>

</html>