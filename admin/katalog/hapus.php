<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM katalog WHERE id_katalog = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "katalog Berhasil dihapus";
   echo "<script>window.location.replace('../katalog/');</script>";
}
