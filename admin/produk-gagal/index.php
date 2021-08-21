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
                            <h1 class="m-0 text-dark">Daftar Produk Gagal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Produk Gagal</li>
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
                                    <button data-toggle="modal" data-target="#modal-cetak" class="btn bg-yellow"><i class="fa fa-print"> Cetak</i></button>
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
                                                    <th>Status Pengerjaan</th>
                                                    <th>Status Pengambilan</th>
                                                    <th>Keterangan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                             <tbody style="background-color: azure">
                                            <?php
                                                $no = 1;
                                                $data = $koneksi->query("SELECT * FROM produk_gagal AS pg
                                                LEFT JOIN pemesanan AS pm ON pg.id_pemesanan = pm.id_pemesanan
                                                LEFT JOIN pelanggan AS pl ON pm.id_pelanggan = pl.id_pelanggan
                                                LEFT JOIN katalog AS k ON pm.id_katalog = k.id_katalog
                                                ORDER BY id_pg DESC");
                                                while ($row = $data->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td align="center"><?= $no++ ?></td>
                                                    <td><?= tgl_indo($row['tanggal_pesan']) ?></td>
                                                    <td><?= $row['nama_pelanggan'] ?></td>
                                                    <td><?= $row['nama_katalog'] ?> - Ukuran : <?= $row['ukuran'] ?></td>
                                                    <td align="center"><?= $row['tipe_pembayaran'] ?></td>
                                                    <td><a href="<?= base_url(); ?>/filependukung/<?= $row['file']?>" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a></td>
                                                    <td align="center">
                                                        <?php if($row['status_bayar'] == "Sudah Dibayar"){ ?>
                                                            <span class="badge badge-success"><?= $row['status_bayar'] ?></span>    
                                                        <?php }else{ ?>
                                                            <span class="badge badge-warning"><?= $row['status_bayar'] ?></span>  
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php if($row['status_pengerjaan'] == "Selesai"){ ?>
                                                            <span class="badge badge-success"><?= $row['status_pengerjaan'] ?></span>    
                                                        <?php }elseif($row['status_pengerjaan'] == "Sedang Diproses"){ ?>
                                                            <span class="badge badge-warning"><?= $row['status_pengerjaan'] ?></span>  
                                                        <?php }else{ ?>
                                                            <span class="badge badge-danger"><?= $row['status_pengerjaan'] ?></span>  
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php if($row['status_pengambilan'] == "Sudah Diambil"){ ?>
                                                            <span class="badge badge-success"><?= $row['status_pengambilan'] ?></span>    
                                                        <?php }elseif($row['status_pengambilan'] == "Belum Diambil"){ ?>
                                                            <span class="badge badge-warning"><?= $row['status_pengambilan'] ?></span>   
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $row['keterangan'] ?></td>
                                                    <td align="center">
                                                        <a href="edit?id=<?= $row['id_pg'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                        <a href="hapus?id=<?= $row['id_pg'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                          </tbody>
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


        <!-- MODAL FILTER CETAK -->
        <div class="modal fade" id="modal-cetak">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Filter Cetak Laporan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="print" target="blank" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control" required>
                                <option value="" selected disabled>--Pilih Bulan--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control" required>
                                <option value="" selected disabled>--Pilih Tahun--</option>
                                <?php for ($i=2020; $i <= date('Y'); $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                   </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"> Cetak</i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"> Tutup</i></button>
                    </div>
                </form>
            </div>
         </div>
        </div>
            <!-- /.modal-content -->

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