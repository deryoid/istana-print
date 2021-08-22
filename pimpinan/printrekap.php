<?php
include '../config/config.php';
include '../config/koneksi.php';

$no =1;

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA </title>
</head>

<body>
<img src="<?=base_url('assets/dist/img/istana-print.png')?>" align="left" width="90" height="90">
<img src="<?=base_url('assets/dist/img/blank.jpg')?>" align="right" width="90" height="90">
    <p align="center"><b>
        <font size="5">ISTANA PRINT</font><br>
        <font size="3">
            Jl. Bridgen H. Hasan Basri, kayutangi (Samping ALFAMART) <br>
            Telp : 0812 5834 9128 - 0858 2821 1851 <br>
            Email : istanaprintkayutangi@gmail.com
        </font>
        <hr size="2px" color="black">
    </b></p>

    Cetak : <?= $_SESSION['username'] ?>
    <div style="float: right;">
        Tanggal Cetak :
        <?= tgl_indo(date('Y-m-d')) ?> <br>
        Halaman : 1
    </div>
    
  <br>
  <h3 style="text-align: center;">Laporan Rekap Data Keseluruhan</h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Data</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
      
                    <?php 
                        $data1 = $koneksi->query("SELECT COUNT(*) as jml FROM karyawan")->fetch_array();
                        $data2 = $koneksi->query("SELECT COUNT(*) as jml FROM pelanggan")->fetch_array();
                        $data3 = $koneksi->query("SELECT COUNT(*) as jml FROM katalog")->fetch_array();
                        $data4 = $koneksi->query("SELECT COUNT(*) as jml FROM pemesanan")->fetch_array();
                    ?>

                    <tbody>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td>Karyawan</td>
                            <td align="center"><?= $data1['jml']; ?></td>
                        </tr>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td>Pelanggan</td>
                            <td align="center"><?= $data2['jml']; ?></td>
                        </tr>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td>Katalog Terdaftar</td>
                            <td align="center"><?= $data3['jml']; ?></td>
                        </tr> 
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td>Pemesanan</td>
                            <td align="center"><?= $data4['jml']; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <br>

    </div>

    </div>
    <div style="text-align: center; display: inline-block; float: right;">
    
    <div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Istana Print
  </h5>
</div>

</body>

</html>

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