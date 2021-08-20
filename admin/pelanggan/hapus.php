<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Pelanggan Berhasil dihapus";
   echo "<script>window.location.replace('../pelanggan/');</script>";
}
