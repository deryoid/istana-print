<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM proyek as p 
LEFT JOIN perusahaan as pr 
ON p.id_perusahaan = pr.id_perusahaan  
WHERE p.id_proyek = '$id' ");

$row  = $data->fetch_array();

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
    <title>Report</title>
</head>

<body>
    <!-- Kop Here ! -->
    <h3>
        <center><br>
            Data Proyek yang Tunda<br>
        </center>
    </h3><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box" align="left">
                <div class="table-responsive text-center">
                    <table border="1" cellspacing="0" width="100%" style="text-align: left">
                        <thead>
                            <b>
                                <tr>
                                    <p>
                                        <th width="40%">Kode Proyek</th>
                                        <th><?php echo $row['kode_proyek'] ?></th>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <th>Nama Proyek</th>
                                        <th><?php echo $row['nama_proyek'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Perusahaan</th>
                                        <th><?php echo $row['nama_perusahaan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Lokasi Pengerjaan</th>
                                        <th><?php echo $row['alamat_proyek'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Estimasi Pengerjaan</th>
                                        <th><?php echo $row['estimasi'] ?></th>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <th>Status</th>
                                        <th><?php echo $row['status_proyek'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Keterangan Di Tunda</th>
                                        <th><?php echo $row['ket_tunda'] ?></th>
                                    </p>
                                </tr>


                            </b>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

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

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>



</body>

</html>