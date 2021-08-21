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
                            <h1 class="m-0 text-dark">Produk Gagal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Produk Gagal</li>
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
                                        <h3 class="card-title">Produk Gagal</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID Pemesanan</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" readonly required>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" data-toggle="modal" data-target="#modal-cari" class="btn bg-indigo"><i class="fa fa-search"> Cari ID</i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tanggal_pesan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pelanggan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Katalog Dipesan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_katalog" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10" id="file"></div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipe Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tipe_pembayaran" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Bayar</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_bayar" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Pengerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_pengerjaan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Pengambilan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="status_pengambilan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea name="keterangan" rows="3" class="form-control" required></textarea>
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

        <!-- MODAL CARI DATA-->
        <div class="modal fade" id="modal-cari">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Klik baris tabel untuk memilih data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
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
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    $data = $koneksi->query("SELECT * FROM pemesanan AS p
                                                LEFT JOIN pelanggan AS pl ON p.id_pelanggan = pl.id_pelanggan
                                                LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog
                                                WHERE id_pemesanan NOT IN (SELECT id_pemesanan FROM produk_gagal)
                                                ORDER BY p.id_pemesanan DESC");
                                    while ($row = $data->fetch_array()) {
                                ?>
                                    <tr style="cursor: pointer;" class="klik_id" 
                                        data-id="<?= $row['id_pemesanan'] ?>"
                                        data-tanggal_pesan="<?= $row['tanggal_pesan'] ?>"
                                        data-nama_pelanggan="<?= $row['nama_pelanggan'] ?>"
                                        data-nama_katalog="<?= $row['nama_katalog'] ?>"
                                        data-tipe_pembayaran="<?= $row['tipe_pembayaran'] ?>"
                                        data-file="<?= $row['file'] ?>"
                                        data-status_bayar="<?= $row['status_bayar'] ?>"
                                        data-status_pengerjaan="<?= $row['status_pengerjaan'] ?>"
                                        data-status_pengambilan="<?= $row['status_pengambilan'] ?>"
                                    >
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
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                   </div>
                    
            </div>
            <!-- /.modal-content -->
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

    <script type="text/javascript">
        $(document).on('click', '.klik_id', function () {
            document.getElementById("id_pemesanan").value = $(this).attr('data-id');
            document.getElementById("tanggal_pesan").value = $(this).attr('data-tanggal_pesan');
            document.getElementById("nama_pelanggan").value = $(this).attr('data-nama_pelanggan');
            document.getElementById("nama_katalog").value = $(this).attr('data-nama_katalog');
            document.getElementById("tipe_pembayaran").value = $(this).attr('data-tipe_pembayaran');
            document.getElementById("file").innerHTML  = '<a href="<?= base_url(); ?>/filependukung/'+ $(this).attr('data-file')+'" data-title="file" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>';
            document.getElementById("status_bayar").value = $(this).attr('data-status_bayar');
            document.getElementById("status_pengerjaan").value = $(this).attr('data-status_pengerjaan');
            document.getElementById("status_pengambilan").value = $(this).attr('data-status_pengambilan');
            $('#modal-cari').modal('hide');
        });

    </script>


    <?php
    if (isset($_POST['submit'])) {
        $id_pemesanan = $_POST['id_pemesanan'];
        $tanggal      = date('Y-m-d');
        $keterangan   = $_POST['keterangan'];

        $submit = $koneksi->query("INSERT INTO produk_gagal VALUES (
            NULL,
            '$tanggal',
            '$id_pemesanan',
            '$keterangan'
            )");

        if ($submit) {
            $_SESSION['pesan'] = "Data Produk Gagal Ditambahkan";
            echo "<script>window.location.replace('../produk-gagal/');</script>";
        }
    }
    ?>


</body>

</html>