<?php 
session_start();
include 'koneksi.php';
$user=$_POST['username'];
$pass=$_POST['password'];

$query=mysql_query("select * from tb_login where username='$user' and password='$pass'")or die(mysql_error());

$data = mysql_fetch_assoc($query);


if ($data['username'] == $user) {

	if ($data ['role'] == 'admin') {
		
		$_SESSION['username'] = $user;
		header("Location:admin/index.php");
		
	} else if ( $data ['role'] == 'kasir') {
		$_SESSION['username'] = $user;
		header("Location:kasir/index.php");
	} 
} else {

	header("Location:index.php?pesan=gagal");

}

// if(mysql_num_rows($query)==1){
// 	$_SESSION['username']=$user;
// 	header("location:admin/index.php");
// }else{
// 	header("location:index.php?pesan=gagal")or die(mysql_error());
// 	// mysql_error();
// }
// echo $pas;
 ?>