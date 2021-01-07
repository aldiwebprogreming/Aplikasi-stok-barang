<?php 


include "../koneksi.php";

$id = $_GET['id'];

$delet = mysql_query("DELETE FROM tb_login WHERE id = '$id'");

if ($delet) {
	header("Location:akun.php?pesan=hapus");
}else{

	echo "gagal";


}


 ?>