<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';
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
                            <h1 class="m-0 text-dark">Daftar Pemesanan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Pemesanan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger card-outline">
                                <div class="card-header">
                                    <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a>
                                    <a href="print" target="blank" class="btn bg-yellow"><i class="fa fa-print"> Cetak</i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                    ?>
                                        <div class="alert alert-info alertinfo" role="alert">
                                            <i class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></i>
                                        </div>
                                    <?php
                                        $_SESSION['pesan'] = '';
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-red">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Tanggal Pesananan</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Katalog Dipesan</th>
                                                    <th>Tipe Pembayaran</th>
                                                    <th>File</th>
                                                    <th>Status Bayar</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pemesanan AS p
                                            LEFT JOIN pelanggan AS pl ON p.id_pelanggan = pl.id_pelanggan
                                            LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog ORDER BY id_pemesanan DESC");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: azure">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td><?= tgl_indo($row['tanggal_pesan']) ?></td>
                                                        <td><?= $row['nama_pelanggan'] ?></td>
                                                        <td><?= $row['nama_katalog'] ?> - Ukuran : <?= $row['ukuran'] ?></td>
                                                        <td><a href="<?= base_url(); ?>/filependukung/<?= $row['file']?>" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a></td>
                                                        <td align="center"><?= $row['tipe_pembayaran'] ?></td>
                                                        <td align="center">
                                                            <?php if($row['status_bayar'] == "Sudah Dibayar"){ ?>
                                                                <span class="badge badge-success"><?= $row['status_bayar'] ?></span>    
                                                            <?php }else{ ?>
                                                                <span class="badge badge-warning"><?= $row['status_bayar'] ?></span>  
                                                            <?php } ?>
                                                        </td>
                                                        <td align="center">
                                                            <!-- <a href="printdetail?id=<?= $row['id_perusahaan'] ?>" class="btn btn-info btn-sm" target="blank" title="Print Detail"><i class="fa fa-print"></i></a> -->
                                                            <a href="edit?id=<?= $row['id_pemesanan'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="hapus?id=<?= $row['id_pemesanan'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
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

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>

</body>

</html>