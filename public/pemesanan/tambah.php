<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                                <li class="breadcrumb-item active">Data</li>
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
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Pemesanan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    <div class="form-group row">
                                            <label for="nama_pemesan" class="col-sm-2 col-form-label">Nama Cust</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nik" name="nik">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_wa" class="col-sm-2 col-form-label">No Whatsapp</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_wa" name="no_wa">
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
                                                        <option value="<?= $dsn['id_katalog'] ?>"><?= $dsn['nama_katalog'] ?> - Ukuran : <?= $dsn['ukuran'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="" name="tanggal_pesan" value="<?php echo date("Y-m-d") ; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('index') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_pemesan        = $_POST['nama_pemesan'];
        $nik                 = $_POST['nik'];
        $no_wa               = $_POST['no_wa'];
        $id_katalog          = $_POST['id_katalog'];
        $tanggal_pesan       = $_POST['tanggal_pesan'];

//upload file mhs
$e = "";
// CEK APAKAH file DIGANTI
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
        } else {    
            $nama_file = $data['file']; 
            $e .= "Upload Success!"; 
        }


        $submit = $koneksi->query("INSERT INTO pemesanan VALUES (
            NULL,
            '$nama_pemesan',
            '$nik',
            '$no_wa',
            '$id_katalog',
            '$tanggal_pesan',
            '$nama_file',
            'Baru',
            NULL,
            NULL
            )");

        if ($submit) {
            $_SESSION['pesan'] = "Pemesanan Sudah Diajukan Silahkan Datang KeIstana Print";
            echo "<script>window.location.replace('../../index');</script>";
        }
    }

    ?>


</body>

</html>