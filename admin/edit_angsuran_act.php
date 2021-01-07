<?php 

include "../koneksi.php";

$id = $_POST['id'];

$id_bayar = $_POST['id_bayar'];
$tanggal= $_POST['tanggal'];
$bayar = $_POST['bayar'];



$edit = mysql_query("UPDATE bayar SET tanggal = '$tanggal', sisa_pembayaran='$bayar' WHERE id_bayar = '$id_bayar'") or die(mysql_error());

if ($edit) {
				$x=mysql_query("select sum(sisa_pembayaran) as total from bayar WHERE id = '$id'"); 
                $xx=mysql_fetch_array($x); 

                $a = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id'") or die(mysql_error());
                $aa = mysql_fetch_array($a);

              	 $angka1 = $xx['total'];
               
              	 $angka2 = $aa['total_harga'];

              	  $hasil = $angka2 - $angka1;

              	  $akhir = $hasil - $aa['uang_muka'];

              	 $edit1 = mysql_query("UPDATE tb_hutang SET sisa_pembayaran = '$akhir' WHERE id = '$id'") or die(mysql_error());


		$y = $aa['id'];
	
	header("Location:detail_angsuran.php?id=$y"); 



} else {


	header("Location:data_barang.php?erroredit");
}



 ?>