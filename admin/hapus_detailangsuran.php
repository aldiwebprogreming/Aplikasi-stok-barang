<?php 

include "../koneksi.php";

$id = $_GET['id_bayar'];



$data = mysql_query("SELECT * FROM bayar WHERE id_bayar = '$id'") or die(mysql_error());
$aa = mysql_fetch_array($data);

$y = $aa['sisa_bayar'];
$edit = mysql_query("UPDATE tb_hutang SET sisa_pembayaran ='$y' WHERE id = '$id' ") or die(mysql_error());


if ($edit == TRUE) {
	
	 	$hps = mysql_query("DELETE FROM bayar WHERE id_bayar = '$id'") or die(mysql_error());

	 	echo "berhasil";
	 

}  else

{
	echo "gagal";
	# code...
}


// 

// 	$aa = mysql_fetch_array($data);

// 	$hasil = $aa['sisa_bayar'];
// 	$idku = $aa['id_bayar'];

// 	$ubah = mysql_query("UPDATE tb_hutang SET sisa_pembayaran = '$hasil' WHERE id = '$idku'") or die(mysql_error());



// if ($data) {

// 	$delet = mysql_query("DELETE FROM bayar WHERE id_bayar = '$id'");

// 	header("Location:detail_angsuran?id=$idku");
// }else{

// 	echo "gagal";


// }


 ?>