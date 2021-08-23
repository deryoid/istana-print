<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM katalog WHERE id_katalog = '$id'");
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
                            <h1 class="m-0 text-dark">Ubah Katalog</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Katalog</li>
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
                                        <h3 class="card-title">Perusahaan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">


                                    <div class="form-group row">
                                            <label for="nama_katalog" class="col-sm-2 col-form-label">Nama Katalog</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_katalog" name="nama_katalog"  value="<?= $row['nama_katalog']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_katalog" class="col-sm-2 col-form-label">Jenis Katalog</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jenis_katalog" name="jenis_katalog"  value="<?= $row['jenis_katalog']; ?>">
                                            </div>
                                        </div>
                                    
                                        <!-- <div class="form-group row">
                                            <label for="qty" class="col-sm-2 col-form-label">qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="qty" name="qty"  value="<?= $row['qty']; ?>">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ukuran" name="ukuran"  value="<?= $row['ukuran']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="harga" name="harga"  value="<?= $row['harga']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga_desain" class="col-sm-2 col-form-label">Harga Desain</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="harga_desain" name="harga_desain"  value="<?= $row['harga_desain']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="total_harga" name="total_harga"  value="<?= $row['total_harga']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="file" name="file">
                                                <small style="color: red; font-style: italic;">*Kosongkan file jika tidak diubah</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/katalog/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nama_katalog        = $_POST['nama_katalog'];
        $jenis_katalog       = $_POST['jenis_katalog'];
        // $qty                 = $_POST['qty'];
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
                    if (file_exists($dir_file . $row['file'])) {
                        unlink($dir_file . $row['file']);
                    }
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
            $nama_file = $row['file'];
        }

        $submit = $koneksi->query("UPDATE katalog SET  
                            nama_katalog = '$nama_katalog',
                            jenis_katalog = '$jenis_katalog',
                            -- qty = '$qty',
                            ukuran = '$ukuran',
                            harga = '$harga',
                            harga_desain = '$harga_desain',
                            total_harga = '$total_harga',
                            file = '$nama_file'
                            WHERE 
                            id_katalog = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Katalog Diubah";
            echo "<script>window.location.replace('../katalog/');</script>";
        }
    }

    ?>

</body>

</html>