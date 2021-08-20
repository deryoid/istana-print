<?php
include '../../config/config.php';
include '../../config/koneksi.php';
include '../../config/day.php';

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
  <div style="text-align: center; font-size: 18;">
        Laporan Daftar Staff Karyawan
  </div>
  <br>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>TTL</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Hp</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM karyawan");
                        while ($row = $data->fetch_array()) {
                    ?>
                        <tr align="center">
                            <td><?= $no++ ?></td>
                            <td align="left"><?= $row['nama_karyawan'] ?></td>
                            <td><?= $row['jk'] ?></td>
                            <td align="left"><?= $row['tempat_lahir'].', '.tgl_indo($row['tgl_lahir']) ?></td>
                            <td><?= $row['agama'] ?></td>
                            <td><?= $row['pendidikan'] ?></td>
                            <td><?= $row['jurusan'] ?></td>
                            <td align="left"><?= $row['alamat'] ?></td>
                            <td><?= $row['hp'] ?></td>
                            <td><?= $row['bidang'] ?></td>
                            <td><?= $row['jabatan'] ?></td>
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