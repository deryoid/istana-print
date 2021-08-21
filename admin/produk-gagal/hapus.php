<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM produk_gagal WHERE id_pg = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Data Produk Gagal Berhasil dihapus";
   echo "<script>window.location.replace('../produk-gagal/');</script>";
}
