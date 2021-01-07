<?php 

include "../koneksi.php";

$id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$merek = $_POST['merek'];
$harga_modal = $_POST['harga_modal'];
$harga_jual = $_POST['harga_jual'];
$jumlah_stok = $_POST['jumlah_stok'];


$edit = mysql_query("UPDATE tb_barang SET kode_barang = '$kode_barang', nama_barang='$nama_barang', merek = '$merek', harga_modal =$harga_modal, harga_jual='$harga_jual', jumlah_stok = '$jumlah_stok' WHERE id = '$id'") or die(mysql_error());


if ($edit) {

	header("location:data_barang.php?edit");
} else {


	header("Location:data_barang.php?erroredit");
}



 ?>