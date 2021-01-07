<?php 


session_start();

include "../koneksi.php";
foreach ($_SESSION['items'] as $key => $d) {
	$query = mysql_query ("select tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.merek, tb_barang.harga_jual from tb_barang where tb_barang.id = '$key'");
  	$data = mysql_fetch_array ($query);
	$d =  $data['kode_barang'];



$kode_barang = $_POST["kode_barang$d"];
$nama_barang = $_POST["nama_barang$d"];
$merek = $_POST["merek$d"];
$harga_barang = $_POST["harga_barang$d"];
$jumlah = $_POST["jumlah$d"];
$total_harga = $_POST["total_harga$d"];
$tgl = $_POST["tgl$d"];
$waktu = $_POST["waktu$d"];
$kode = $_POST["kode_pembelian$d"];




$input = mysql_query("INSERT INTO tb_beli VALUES 
	('','$kode_barang', '$nama_barang','$merek','$harga_barang','$jumlah','$total_harga','$tgl','$waktu','$kode')") or die(mysql_error());



if ($input == true) {


	 
 	 echo "<script>alert( 'Data berhasil di simpan' ); window.location.href='produk.php';</script>";

} else {

 	echo "Data gagal di input";
 }




}

 ?>