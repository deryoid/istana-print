<?php
require '../../config/config.php';
require '../../config/koneksi.php';

$id   =  $_GET['id'];
$v    = $_GET['v'];

if ($v == "Di Tanggapi") {
    $submit = $koneksi->query("UPDATE proyek SET  status_proyek = '$v' WHERE id_proyek = '$id'");
} elseif ($v == "Di Tunda") {
    $submit = $koneksi->query("UPDATE proyek SET status_proyek = '$v' WHERE id_proyek = '$id'");
} else {
    $submit = $koneksi->query("UPDATE proyek SET status_proyek = '$v' WHERE id_proyek = '$id'");
}

if ($submit) {

    $data = $koneksi->query("SELECT * FROM proyek WHERE id_proyek = '$id'")->fetch_array();



    $_SESSION['pesan'] = "Status Proyek Diubah";
    echo "<script>window.location.replace('../proyek');</script>";
}
