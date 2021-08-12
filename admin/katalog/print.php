<?php
include '../../config/config.php';
include '../../config/koneksi.php';


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
<!-- <img src="<?=base_url('assets/dist/img/logo_pln.jpg')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="7">PT. GERAI INDAH MARABAHAN</font> <br> <br> <br> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jl. AES Nasution, Marabahan Kota, Marabahan Kabupaten Barito Kuala Kalimantan Selatan </font></center>
    <hr size="2px" color="black">
  </b></p> -->
    <p align="center"><b>
            <font size="5">Laporan Data Katalog</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead class="bg-red">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Qty</th>
                                                    <th>Ukuran</th>
                                                    <th>Harga</th>
                                                    <th>Harga Design</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM katalog");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: azure">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td><?= $row['nama_katalog'] ?></td>
                                                        <td><?= $row['jenis_katalog'] ?></td>
                                                        <td><?= $row['qty'] ?></td>
                                                        <td><?= $row['ukuran'] ?></td>
                                                        <td><?= $row['harga'] ?></td>
                                                        <td><?= $row['harga_desain'] ?></td>
                                                        <td><?= $row['total_harga'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                </table>

            </div>
        </div>
    </div>
    <br>

    </div>

    </div>
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