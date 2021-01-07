<?php 
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];



$input = mysql_query("INSERT INTO tb_login VALUES ('','$username','$password','$role') ") or die( mysql_error());
if ($input) {
	 echo "<script>alert( 'Akun berhasil di simpan' ); window.location.href='akun.php';</script>";
}


 ?>