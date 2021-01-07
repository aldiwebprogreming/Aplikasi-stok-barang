<?php 


include "../koneksi.php";

$id = $_GET['id'];

$delet = mysql_query("DELETE FROM tb_barang WHERE id = '$id'");

if ($delet) {
	header("Location:data_barang.php?pesan=hapus");
}else{

	echo "gagal";


}


 ?>