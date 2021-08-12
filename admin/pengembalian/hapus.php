<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pengembalian WHERE id_pengembalian = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "pengembalian Berhasil dihapus";
   echo "<script>window.location.replace('../pengembalian/');</script>";
}
