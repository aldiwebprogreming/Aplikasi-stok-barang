<?php 


include "../koneksi.php";

$id = $_GET['id'];

$delet = mysql_query("DELETE FROM tb_hutang WHERE id = '$id'");

if ($delet) {
	header("Location:data_hutang.php?pesan=hapus");
}else{

	echo "gagal";


}


 ?>