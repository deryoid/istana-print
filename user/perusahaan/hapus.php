<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM perusahaan WHERE id_perusahaan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "perusahaan Berhasil dihapus";
   echo "<script>window.location.replace('../perusahaan/');</script>";
}
