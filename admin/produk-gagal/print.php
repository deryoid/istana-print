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

  Filter : <?= $bln[$_POST['bulan']].'/'.$_POST['tahun'] ?> <br>
  Cetak : <?= $_SESSION['username'] ?>
  <div style="float: right;">
    Tanggal Cetak :
    <?= tgl_indo(date('Y-m-d')) ?> <br>
    Halaman : 1
  </div>

  <br>
  <h3 style="text-align: center;">Laporan Produk Gagal</h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Tanggal Pesananan</th>
                            <th>Nama Pelanggan</th>
                            <th>Katalog Dipesan</th>
                            <th>Tipe Pembayaran</th>
                            <th>Status Bayar</th>
                            <th>Status Pengerjaan</th>
                            <th>Status Pengambilan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM produk_gagal AS pg
                            LEFT JOIN pemesanan AS pm ON pg.id_pemesanan = pm.id_pemesanan
                            LEFT JOIN pelanggan AS pl ON pm.id_pelanggan = pl.id_pelanggan
                            LEFT JOIN katalog AS k ON pm.id_katalog = k.id_katalog
                            WHERE MONTH(tanggal_pesan) = '$_POST[bulan]' AND YEAR(tanggal_pesan) = '$_POST[tahun]'");
                            while ($row = $data->fetch_array()) {
                        ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td><?= tgl_indo($row['tanggal_pesan']) ?></td>
                            <td><?= $row['nama_pelanggan'] ?></td>
                            <td><?= $row['nama_katalog'] ?> - Ukuran : <?= $row['ukuran'] ?></td>
                            <td align="center"><?= $row['tipe_pembayaran'] ?></td>
                            <td align="center">
                                <?php if($row['status_bayar'] == "Sudah Dibayar"){ ?>
                                    <span class="badge badge-success"><?= $row['status_bayar'] ?></span>    
                                <?php }else{ ?>
                                    <span class="badge badge-warning"><?= $row['status_bayar'] ?></span>  
                                <?php } ?>
                            </td>
                            <td align="center">
                                <?php if($row['status_pengerjaan'] == "Selesai"){ ?>
                                    <span class="badge badge-success"><?= $row['status_pengerjaan'] ?></span>    
                                <?php }elseif($row['status_pengerjaan'] == "Sedang Diproses"){ ?>
                                    <span class="badge badge-warning"><?= $row['status_pengerjaan'] ?></span>  
                                <?php }else{ ?>
                                    <span class="badge badge-danger"><?= $row['status_pengerjaan'] ?></span>  
                                <?php } ?>
                            </td>
                            <td align="center">
                                <?php if($row['status_pengambilan'] == "Sudah Diambil"){ ?>
                                    <span class="badge badge-success"><?= $row['status_pengambilan'] ?></span>    
                                <?php }elseif($row['status_pengambilan'] == "Belum Diambil"){ ?>
                                    <span class="badge badge-warning"><?= $row['status_pengambilan'] ?></span>   
                                <?php } ?>
                            </td>
                            <td><?= $row['keterangan'] ?></td>
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

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>