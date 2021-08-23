<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$data  = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id'")->fetch_array();
$file  = $data['file'];
$bukti_tf = $data['bukti_transfer'];

if($file){
   unlink('../../filependukung/'. $file);
}

if($bukti_tf){
   unlink('../../assets/bukti_transfer/'. $bukti_tf);
}

$hapus = $koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Pemesanan Berhasil dihapus";
   echo "<script>window.location.replace('../pemesanan/');</script>";
}
