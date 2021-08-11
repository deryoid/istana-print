<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM karyawan WHERE id_karyawan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "karyawan Berhasil dihapus";
   echo "<script>window.location.replace('../karyawan/');</script>";
}
