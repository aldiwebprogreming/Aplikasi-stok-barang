<?php 

session_start();
include "../koneksi.php";

echo "<pre>";
print_r($_SESSION);

echo "</pre>";


foreach ($_SESSION['items'] as $key => $d) {

	$kode_barang = $_POST["kode_barang$d"];
	$nama_barang = $_POST['nama$d'];
	$merek = $_POST["merek$d"];
	$harga_barang = $_POST["harga_barang$d"];
	$jumlah = $_POST["jumlah$d"];
	$tgl = $_POST["tgl$d"];
	$waktu = $_POST["waktu$d"];

	echo $kode_barang;
}

 ?>

