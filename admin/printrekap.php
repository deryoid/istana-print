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

    <p align="center"><b>
            <font size="5">Laporan Rekap Keseluruhan Data</font> <br>
            <hr size="2px" color="black">
        </b></p>

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

                    <tbody>

                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>                    
                                    <?php 
                                $dataiumk = $koneksi->query("SELECT * FROM katalog ORDER BY id_katalog DESC");
                                $jumlah = mysqli_num_rows($dataiumk);
                                ?>
                                <h3>Katalog Terdaftar</h3>
                                </td>
                                <td align="center"><h3><?= $jumlah; ?></h3></td>
                            </tr>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>                    
                                <?php 
                                $dataahli_waris = $koneksi->query("SELECT * FROM karyawan
                                ORDER BY id_karyawan DESC");
                                $jumlah1 = mysqli_num_rows($dataahli_waris);
                                ?>
                                <h3>Karyawan</h3>
                                </td>
                                <td align="center"><h3><?= $jumlah1; ?></h3></td>
                            </tr>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>                    
                                <?php 
                                $datakematian = $koneksi->query("SELECT * FROM pemesanan AS p
                                LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog
                                LEFT JOIN karyawan AS ky ON p.id_karyawan = ky.id_karyawan");
                                $jumlah2 = mysqli_num_rows($datakematian);
                                ?>
                                <h3>Data Pemesanan</h3>
                                </td>
                                <td align="center"><h3><?= $jumlah2; ?></h3></td>
                            </tr>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>                    
                                <?php 
                                 $dataktm = $koneksi->query("SELECT * FROM pengembalian ORDER BY id_pengembalian");
                                 $jumlah3 = mysqli_num_rows($dataktm);
                                ?>
                                <h3>Barang yang Dikembalikan</h3>
                                </td>
                                <td align="center"><h3><?= $jumlah3; ?></h3></td>
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