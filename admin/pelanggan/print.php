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
  <h3 style="text-align: center;">Laporan Data Pelanggan</h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead class="bg-red">
                    <tr align="center">
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
                        while ($row = $data->fetch_array()) {
                        ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td align="center"><?= $row['id_pelanggan'] ?></td>
                            <td><?= $row['nama_pelanggan'] ?></td>
                            <td align="center"><?= $row['jk'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td align="center"><?= $row['no_hp'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
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