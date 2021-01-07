<?php 

include "../koneksi.php";

$id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$merek = $_POST['merek'];
$harga_barang = $_POST['harga_barang'];
$jumlah = $_POST['jumlah'];
$total_harga = $_POST['total_harga'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];


$edit = mysql_query("UPDATE tb_beli SET kode_barang = '$kode_barang', nama_barang='$nama_barang', merek = '$merek', harga_barang =$harga_barang, jumlah_stok='$jumlah', total_harga = '$total_harga', tanggal = '$tanggal', jam = '$jam' WHERE id = '$id'") or die(mysql_error());


if ($edit) {

	header("location:data_penjualan.php?edit");
} else {


	header("Location:data_penjualan.php?erroredit");
}



 ?>