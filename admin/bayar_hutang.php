

<?php 

include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$kode_barang = $_POST['kode_barang'];
$tanggal = $_POST['tanggal'];
$harga_barang = $_POST['harga_barang'];
$jumlah = $_POST['jumlah'];
$total_harga = $_POST['total_harga'];
$sisa_utang = $_POST['sisa_utang'];
$bayar = $_POST['bayar'];



$input = mysql_query("INSERT INTO bayar VALUES ('', '$id','$nama','$kode_barang','$tanggal','$harga_barang','$jumlah', '$total_harga','$sisa_utang','$bayar')")  or die( mysql_error());;

if ($input == FALSE) {
	 echo "gagal";
}
else {


	  $a = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id'") or die(mysql_error());
      $aa = mysql_fetch_array($a);

      $y = $aa['nama'];


	
	echo "<script>alert( 'Berhasil bayar hutang' ); window.location.href='detail_hutang.php?nama=$y';</script>";
	


	
}

 ?>