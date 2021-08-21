<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$data = $koneksi->query("SELECT * FROM katalog WHERE id_katalog = '$id'")->fetch_array();
$file = $data['file'];

if($file){
   unlink("../../assets/katalog/". $file);
}

$hapus = $koneksi->query("DELETE FROM katalog WHERE id_katalog = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "katalog Berhasil dihapus";
   echo "<script>window.location.replace('../katalog/');</script>";
}
