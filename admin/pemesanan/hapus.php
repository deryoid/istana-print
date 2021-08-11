<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Pemesanan Berhasil dihapus";
   echo "<script>window.location.replace('../pemesanan/');</script>";
}
