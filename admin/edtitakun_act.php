<?php 

include "../koneksi.php";
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];


$edit = mysql_query("UPDATE tb_login SET username = '$username', password = '$password', role ='$role' WHERE id = '$id'") or die(mysql_error());


if ($edit) {

	header("location:akun.php?edit");
} else {


	header("Location:akun.php?erroredit");
}




 ?>