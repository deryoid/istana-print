<?php
require '../../config/config.php';
require '../../config/koneksi.php';

$no = mysqli_query($koneksi, "SELECT id_pelanggan FROM pelanggan ORDER BY id_pelanggan DESC");
$id_pelanggan = mysqli_fetch_array($no);
$id = $id_pelanggan['id_pelanggan'];

$urut = substr($id, 3, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1) {
  $format = "PLG" . "00" . $tambah;
} else if (strlen($tambah) == 2) {
  $format = "PLG" . "0" . $tambah;
} else {
  $format = "PLG" . $tambah;
}

?>
<!DOCTYPE html>
<html>
<?php
include '../../templates_public/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates_public/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates_public/sidebar.php';
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
                                        <h3 class="card-title">Pemesanan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

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


                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="" name="tanggal_pesan" value="<?php echo date("Y-m-d") ; ?>">
                                            </div>
                                        </div>
                                                                            
                                        <div class="form-group row">
                                            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select name="jk" class="form-control" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="no_hp" name="no_hp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pimpinan" class="col-sm-2 col-form-label"> Katalog</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" id="id_katalog" name="id_katalog">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM katalog ORDER BY id_katalog ASC");
                                                    while ($dsn = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dsn['id_katalog'] ?>"><?= $dsn['nama_katalog'] ?> - Ukuran : <?= $dsn['ukuran'] ?> - Harga Total : <?= number_format($dsn['total_harga'],0,',','.') ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="file" name="file" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipe Pembayaran</label>
                                            <div class="col-sm-10">
                                                <select name="tipe_pembayaran" class="form-control" required>
                                                    <option value="" selected disabled>--Pilih--</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Transfer">Transfer</option>
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

        <?php include_once "../../templates_public/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates_public/script.php"; ?>


    <?php
    if (isset($_POST['submit'])) {
        $id_pelanggan       = $format;
        $nama_pelanggan     = $_POST['nama_pelanggan'];
        $jk                 = $_POST['jk'];
        $alamat             = $_POST['alamat'];
        $no_hp              = $_POST['no_hp'];

        $tanggal_pesan       = $_POST['tanggal_pesan'];
        $id_katalog          = $_POST['id_katalog'];
        $tipe_pembayaran     = $_POST['tipe_pembayaran'];

        $pelanggan = $koneksi->query("INSERT INTO pelanggan VALUES (
            '$id_pelanggan',
            '$nama_pelanggan',
            '$jk',
            '$alamat',
            '$no_hp'
            )");
        
        if($pelanggan){

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
                // var_dump($nama_file); die();

                if (in_array($ext_file, $allow_ext) === true) {
                    if ($size_file <= $allow_size) {
                        move_uploaded_file($tmp_file, $dir_file . $nama_file);
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
            }


            $submit = $koneksi->query("INSERT INTO pemesanan VALUES (
                NULL,
                '$tanggal_pesan',
                '$id_pelanggan',
                '$id_katalog',
                '$nama_file',
                '$tipe_pembayaran',
                'Belum Dibayar',
                NULL,
                NULL
                )");

            if ($submit) {

                $_SESSION['pesan'] = "Data Pemesanan Ditambahkan";
                echo "<script>window.location.replace('../pemesanan/tambah');</script>";
            }
        }
    }
    ?>


</body>

</html>