<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM proyek WHERE id_proyek = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Proyek Berhasil dihapus";
   echo "<script>window.location.replace('../proyek/');</script>";
}
