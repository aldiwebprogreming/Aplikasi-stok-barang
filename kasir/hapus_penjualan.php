<?php 


include "../koneksi.php";

$id = $_GET['id'];

$delet = mysql_query("DELETE FROM tb_beli WHERE id = '$id'");

if ($delet) {
	header("Location:data_penjualan.php?pesan=hapus");
}else{

	echo "gagal";


}


 ?>