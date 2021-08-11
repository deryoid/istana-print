<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id'");
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
                            <h1 class="m-0 text-dark">Ubah Pemesanan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pemesanan</li>
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
                                        <h3 class="card-title">Pemesanan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                       
                                        <div class="form-group row">
                                            <label for="nama_pemesan" class="col-sm-2 col-form-label">Nama Cust</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?= $row['nama_pemesan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $row['nik']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_wa" class="col-sm-2 col-form-label">No Whatsapp</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= $row['no_wa']; ?>">
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
                                                        <option value="<?= $dsn['id_katalog'] ?>" <?php if ($dsn['id_katalog'] == $row['id_katalog']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $dsn['nama_katalog'] ?> - Ukuran : <?= $dsn['ukuran'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="" name="tanggal_pesan" value="<?= $row['tanggal_pesan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="file" name="file" value="<?= $row['file']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" data-placeholder="Pilih " id="status" name="status" >
                                                <option value="Baru" <?php if ($row['status'] == "Baru") {
                                                            echo "selected";
                                                            } ?>>Baru</option>
                                                <option value="Proses" <?php if ($row['status'] == "Proses") {
                                                                echo "selected";
                                                            } ?>>Proses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Karyawan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" id="id_karyawan" name="id_karyawan">
                                                    <option value=""></option>
                                                    <?php
                                                    $data1 = $koneksi->query("SELECT * FROM karyawan ORDER BY id_karyawan ASC");
                                                    while ($dsn = $data1->fetch_array()) {
                                                    ?>
                                                        <option value="<?= $dsn['id_karyawan'] ?>" <?php if ($dsn['id_karyawan'] == $row['id_karyawan']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $dsn['nama_karyawan'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pemesanan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_pemesan        = $_POST['nama_pemesan'];
        $nik                 = $_POST['nik'];
        $no_wa               = $_POST['no_wa'];
        $id_katalog          = $_POST['id_katalog'];
        $tanggal_pesan       = $_POST['tanggal_pesan'];
        $status              = $_POST['status'];
        $id_karyawan         = $_POST['id_karyawan'];

        
//upload file mhs
$e = "";
// CEK APAKAH file DIGANTI
        if (!empty($_FILES['file']['name'])) {
            $filelama = $row['file'];

            // UPLOAD file PEMOHON
            $file      = $_FILES['file']['name'];
            $x_file    = explode('.', $file);
            $ext_file  = end($x_file);
            $nama_file = rand(1, 99999) . '.' . $ext_file;
            $size_file = $_FILES['file']['size'];
            $tmp_file  = $_FILES['file']['tmp_name'];
            $dir_file  = '../../filependukung/';
            $allow_ext        = array('png', 'jpg', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;
            // var_dump($nama_file); die();

            if (in_array($ext_file, $allow_ext) === true) {
                if ($size_file <= $allow_size) {
                    move_uploaded_file($tmp_file, $dir_file . $nama_file);
                    if (file_exists($dir_file . $filelama)) {
                        unlink($dir_file . $filelama);
                    }
                    $e .= "Upload Success"; 
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
        } else {    
            $nama_file = $row['file']; 
            $e .= "Upload Success!"; 
        }

        $submit = $koneksi->query("UPDATE pemesanan SET  
                            nama_pemesan = '$nama_pemesan',
                            nik = '$nik',
                            no_wa = '$no_wa',
                            id_katalog = '$id_katalog',
                            tanggal_pesan = '$tanggal_pesan',
                            file = '$nama_file',
                            status = '$status',
                            id_karyawan = '$id_karyawan'
                            WHERE 
                            id_pemesanan = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Pemesanan Ditambahkan";
            echo "<script>window.location.replace('../pemesanan/');</script>";
        }
    }

    ?>

</body>

</html>