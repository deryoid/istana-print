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
                            <h1 class="m-0 text-dark">Daftar Pengerjaan Selesai</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Pengerjaan Selesai</li>
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
                                    <a href="print" target="blank" class="btn bg-yellow"><i class="fa fa-print"> Cetak Pekerjaan Selesai</i></a>
                                    <a href="print2" target="blank" class="btn bg-yellow"><i class="fa fa-print"> Cetak Barang yang Sudah Diambil</i></a>
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
                                                    <th>Nota</th>
                                                    <th>Nama Cust</th>
                                                    <th>NIK Cust</th>
                                                    <th>No Whatsapp/Telp</th>
                                                    <th>Katalog Dipesan</th>
                                                    <th>Tanggal Pesananan</th>
                                                    <th>Karyawan</th>
                                                    <th>Status</th>
                                                    <th>Status Pengambilan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pemesanan AS p
                                            LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog
                                            LEFT JOIN karyawan AS ky ON p.id_karyawan = ky.id_karyawan
                                            WHERE status = 'Selesai'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: azure">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td align="center"><a href="printdetail?id=<?= $row['id_pemesanan'] ?>" target="blank" class="btn btn-info btn-sm" title="Nota"><i class="fa fa-file-invoice"></i>Nota</a></td>
                                                        <td><?= $row['nama_pemesan'] ?></td>
                                                        <td><?= $row['nik'] ?></td>
                                                        <td><?= $row['no_wa'] ?></td>
                                                        <td><?= $row['nama_katalog'] ?> - Ukuran : <?= $row['ukuran'] ?></td>
                                                        <td><?= $row['tanggal_pesan'] ?></td>
                                                        <td><?= $row['nama_karyawan'] ?></td>
                                                        <td align="center"><b><u><?= $row['status'] ?></u></b></td>
                                                        
                                                        <?php if ($row['status_pengambilan'] != NULL) { ?>
                                                        <td align="center"><b><u><?= $row['status_pengambilan'];?></u></b></td>
                                                        <?php }else{ ?>
                                                            <td align="center"><b><u>Belum Diambil</u></b></td>
                                                        <?php } ?>
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_pemesanan'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i> Pilih Status</a>
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