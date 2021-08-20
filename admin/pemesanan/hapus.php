<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id'")->fetch_array();
$file = $data['file'];

$hapus = $koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan = '$id'");

if ($hapus) {
   unlink('../../filependukung/'. $file);
   $_SESSION['pesan'] = "Pemesanan Berhasil dihapus";
   echo "<script>window.location.replace('../pemesanan/');</script>";
}
