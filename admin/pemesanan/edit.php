<?php
require '../../config/config.php';
require '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan AS p LEFT JOIN pelanggan AS pl ON p.id_pelanggan = pl.id_pelanggan LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog WHERE id_pemesanan = '$id'")->fetch_array();

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
                            <h1 class="m-0 text-dark">Pemesanan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pemesanan</li>
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
                                        <h3 class="card-title">Pemesanan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_pesan" value="<?= $data['tanggal_pesan'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" name="id_pelanggan">
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan ASC");
                                                    while ($dsn = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dsn['id_pelanggan'] ?>" <?= $data['id_pelanggan'] == $dsn['id_pelanggan'] ? "selected" : "" ?>><?= $dsn['nama_pelanggan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pimpinan" class="col-sm-2 col-form-label"> Katalog</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" name="id_katalog">
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM katalog ORDER BY id_katalog ASC");
                                                    while ($dsn = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dsn['id_katalog'] ?>" <?= $data['id_katalog'] == $dsn['id_katalog'] ? "selected" : "" ?>><?= $dsn['nama_katalog'] ?> - Ukuran : <?= $dsn['ukuran'] ?> - Harga Total : <?= number_format($dsn['total_harga'],0,',','.') ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="file">
                                                <small style="color: red; font-style: italic;">*Kosongkan file jika tidak diubah</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipe Pembayaran</label>
                                            <div class="col-sm-10">
                                                <select name="tipe_pembayaran" class="form-control" required>
                                                    <option value="Cash" <?= $data['tipe_pembayaran'] == "Cash" ? "selected" : "" ?>>Cash</option>
                                                    <option value="Transfer" <?= $data['tipe_pembayaran'] == "Transfer" ? "selected" : "" ?>>Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Bayar</label>
                                            <div class="col-sm-10">
                                                <select name="status_bayar" class="form-control" required>
                                                    <option value="Sudah Dibayar" <?= $data['status_bayar'] == "Sudah Dibayar" ? "selected" : "" ?>>Sudah Dibayar</option>
                                                    <option value="Belum Dibayar" <?= $data['status_bayar'] == "Belum Dibayar" ? "selected" : "" ?>>Belum Dibayar</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pemesanan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $tanggal_pesan       = $_POST['tanggal_pesan'];
        $id_pelanggan        = $_POST['id_pelanggan'];
        $id_katalog          = $_POST['id_katalog'];
        $tipe_pembayaran     = $_POST['tipe_pembayaran'];
        $status_bayar        = $_POST['status_bayar'];
        $file_lama           = $data['file'];

        //upload file mhs
        if (!empty($_FILES['file']['name'])) {
            // UPLOAD file PEMOHON
            $file      = $_FILES['file']['name'];
            $x_file    = explode('.', $file);
            $ext_file  = end($x_file);
            $nama_file = rand(1, 99999) . '.' . $ext_file;
            $size_file = $_FILES['file']['size'];
            $tmp_file  = $_FILES['file']['tmp_name'];
            $dir_file  = '../../filependukung/';
            $allow_ext        = array('png', 'jpg', 'JPG', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;

            if (in_array($ext_file, $allow_ext) === true) {
                if ($size_file <= $allow_size) {
                    move_uploaded_file($tmp_file, $dir_file . $nama_file);
                    if (file_exists($dir_file . $file_lama)) {
                        unlink($dir_file . $file_lama);
                    }
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran File Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Tidak Didukung',
                    text:  'Format File Harus Berupa PNG,JPG,RAR, ZIP',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        }else{
            $nama_file = $file_lama;
        }


        $submit = $koneksi->query("UPDATE pemesanan SET
            tanggal_pesan     = '$tanggal_pesan',
            id_pelanggan      = '$id_pelanggan',
            id_katalog        = '$id_katalog',
            file              = '$nama_file',
            tipe_pembayaran   = '$tipe_pembayaran',
            status_bayar      = '$status_bayar'
            WHERE id_pemesanan = '$id'
        ");

        if ($submit) {

            $_SESSION['pesan'] = "Data Pemesanan Diubah";
            echo "<script>window.location.replace('../pemesanan/');</script>";
        }
    }
    ?>


</body>

</html>