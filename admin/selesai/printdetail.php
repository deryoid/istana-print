<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM pemesanan AS p
LEFT JOIN katalog AS k ON p.id_katalog = k.id_katalog
LEFT JOIN karyawan AS ky ON p.id_karyawan = ky.id_karyawan
WHERE p.id_pemesanan = '$id'");
$data = $query->fetch_array();
// var_dump($data);



// $detail = $conn->query("SELECT * FROM detail_transaksi_pembayaran d
//                                       LEFT JOIN stok_menu s ON d.kode_menu = s.kode_menu
//                                       WHERE d.no_nota = '$id' ORDER BY d.id_detail DESC");

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

<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 114mm;
        min-height: 162mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    @page {
        size: Amplop C6;
        margin: auto;
    }
    @media print {
        html, body {
            width: 100mm;
            height: 160mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            page-break-after: always;
        }
    }
</style>

<!DOCTYPE html>
<html>

<head>
    <title>NOTA TRANSAKSI PEMBAYARAN </title>
</head>

<body>
    <img src="<?= base_url('assets/dist/img/istana-print.PNG') ?>" align="left" width="100" height="100" style="margin-top: 15px;"><br>
    <p align="center"><b>
            <font size="5">NOTA TRANSAKSI PEMBAYARAN
            <i></i></font> <br>
            <br>
            <font size="5">Istana Print</font>

            <hr size=" 2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table width="100%" cellspacing="2" border="0">
                    <tr>
                        <td width="25%"><b>No Nota</b></td>
                        <td width="3%">:</td>
                        <td width="72%">
                            <b><?= $data[0]; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Tanggal Transaksi</td></b>
                        <td>:</td>
                        <td>
                            <b><?= date('d-m-Y', strtotime($data['tanggal_pesan'])); ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Nama Pemesan</td></b>
                        <td>:</td>
                        <td>
                            <b><?= $data['nama_pemesan'] ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Nomor Telp/WA</td></b>
                        <td>:</td>
                        <td>
                            <b><?= $data['no_wa'] ?></b>
                        </td>
                    </tr>

                </table>

                <hr>

                <table width="100%" border="0" cellspacing="0">
                    <thead>
                        <tr style="color: black;">
                            <!-- <th style="text-align: center; ">No</th>
                            <th style="text-align: center; ">Nama menu</th>
                            <th style="text-align: center; ">Harga menu</th>
                            <th style="text-align: center; ">Banyak Beli</th>
                            <th style="text-align: center; ">Sub total</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td align="center"><?= $data['nama_katalog']; ?></td>
                                <td align="center"><?= $data['jenis_katalog']; ?></td>
                                <td align="center"><?= $data['ukuran']; ?></td>
                                <td align="center"><?= $data['qty']; ?></td>
                                <td align="right"><?= number_format($data['harga'], '0', ',', '.'); ?></td>
                                <td align="right"><?= number_format($data['harga_desain'], '0', ',', '.'); ?></td>
                            </tr>
                   
                        
                        <tr style="font-size: 18px; font-weight: bold;">
                            <td></td>
                            <td colspan="4">TOTAL:</td>
                            <td align="right"><?= number_format($data['total_harga'], '0', '.', '.') ?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <hr>
                <p>
                    *CATATAN : MENU YANG SUDAH DI BELI TIDAK BISA DI CANCEL !
                </p>

            </div>
        </div>
    </div>


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

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>
    <br>
    <div style="text-align: center; float: right;">
        Tanggal : <?= tgl_indo(date('Y-m-d')); ?>
        <!-- <h5>
            Mengetahui,<br>
            Hormat Kami,
            <br><br><br><br><br><br>
            JANJI JIWA
        </h5> -->

    </div>


</body>

</html>