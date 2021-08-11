<?php
require '../../config/config.php';
require '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM proyek as p 
LEFT JOIN perusahaan as pr 
ON p.id_perusahaan = pr.id_perusahaan  
WHERE p.id_proyek = '$id' ");

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
                            <h1 class="m-0 text-dark">Detail Data Proyek</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Proyek</li>
                                <li class="breadcrumb-item active">Proyek</li>
                                <li class="breadcrumb-item active">Detail Proyek</li>
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
                                    <!-- left column -->
                                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <dl class="row">
                                                <dt class="col-sm-4">Kode Proyek</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['kode_proyek']; ?></dd>
                                                <dt class="col-sm-4">Nama Proyek</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['nama_proyek']; ?></dd>
                                                <dt class="col-sm-4">Perusahaan</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['nama_perusahaan']; ?></dd>
                                                <dt class="col-sm-4">Lokasi Pengerjaan</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['alamat_proyek']; ?></dd>
                                                <dt class="col-sm-4">Estimasi Pengerjaan</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['estimasi']; ?></dd>
                                                <dt class="col-sm-4">Tanggal Mulai</dt>
                                                <dd class="col-sm-8"><?php echo " : " . tgl_indo($row['tgl_mulai']); ?></dd>
                                                <dt class="col-sm-4">Tanggal Selesai</dt>
                                                <dd class="col-sm-8"><?php echo " : " . tgl_indo($row['tgl_selesai']); ?></dd>
                                                <dt class="col-sm-4">Status</dt>
                                                <dd class="col-sm-8"><?php echo " : " . $row['status_jalan']; ?></dd>
                                            </dl>
                                            <table class="table table-bordered table-striped" style="background-color: azure">
                                                <thead class="bg-blue">
                                                    <tr align="center">
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $no = 1;
                                                $data = $koneksi->query("SELECT * FROM barang_keluar as bk 
                                            LEFT JOIN stok as s 
                                            ON bk.nama_barang = s.nama_barang
                                            LEFT JOIN jenis as j
                                            ON s.id_jenis = j.id_jenis
                                            LEFT JOIN satuan as st
                                            ON s.id_satuan = st.id_satuan
                                            LEFT JOIN proyek as p 
                                            ON bk.id_proyek = p.id_proyek 
                                            WHERE bk.id_proyek = '$id'");
                                                while ($row = $data->fetch_array()) {
                                                ?>
                                                    <tbody style="background-color: white">
                                                        <tr>
                                                            <td align="center"><?= $no++ ?></td>
                                                            <td><?= $row['nama_barang'] ?></td>
                                                            <td><?= $row['jenis'] ?></td>
                                                            <td><?= $row['jumlah'] . " " . $row['satuan'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
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

</body>

<script>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>

</html>