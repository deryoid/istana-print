<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                            <h1 class="m-0 text-dark">Katalog</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Katalog</li>
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
                                        <h3 class="card-title">Katalog</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                        <div class="form-group row">
                                            <label for="nama_katalog" class="col-sm-2 col-form-label">Nama Katalog</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_katalog" name="nama_katalog">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_katalog" class="col-sm-2 col-form-label">Jenis Katalog</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jenis_katalog" name="jenis_katalog">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label for="qty" class="col-sm-2 col-form-label">qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="qty" name="qty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ukuran" name="ukuran">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="harga" name="harga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga_desain" class="col-sm-2 col-form-label">Harga Desain</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="harga_desain" name="harga_desain">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="total_harga" name="total_harga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/katalog/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_katalog        = $_POST['nama_katalog'];
        $jenis_katalog       = $_POST['jenis_katalog'];
        $qty                 = $_POST['qty'];
        $ukuran              = $_POST['ukuran'];
        $harga               = $_POST['harga'];
        $harga_desain        = $_POST['harga_desain'];
        $total_harga         = $_POST['total_harga'];

        // UPLOAD FILE
        if (!empty($_FILES['file']['name'])) {
            $file      = $_FILES['file']['name'];
            $x_file    = explode('.', $file);
            $ext_file  = end($x_file);
            $nama_file = rand(1, 99999) . '.' . $ext_file;
            $size_file = $_FILES['file']['size'];
            $tmp_file  = $_FILES['file']['tmp_name'];
            $dir_file  = '../../assets/katalog/';
            $allow_ext        = array('png', 'jpg', 'JPG', 'jpeg');
            $allow_size       = 2048 * 2048 * 10;

            if (in_array($ext_file, $allow_ext) === true) {
                if ($size_file <= $allow_size) {
                    move_uploaded_file($tmp_file, $dir_file . $nama_file);
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran File Terlalu Besar, Maksimal 10 Mb',
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
                    text:  'Format File Harus Berupa PNG,JPG',
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
            $nama_file = NULL;
        }


        $submit = $koneksi->query("INSERT INTO katalog VALUES (
            NULL,
            '$nama_katalog',
            '$jenis_katalog',
            '$qty',
            '$ukuran',
            '$harga',
            '$harga_desain',
            '$total_harga',
            '$nama_file'
            )");

        if ($submit) {

            $_SESSION['pesan'] = "Data Katalog Produk Ditambahkan";
            echo "<script>window.location.replace('../katalog/');</script>";
        }
    }
    ?>


</body>

</html>