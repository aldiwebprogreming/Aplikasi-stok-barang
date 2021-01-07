<?php 

include "../koneksi.php";

$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$merek = $_POST['merek'];
$hargamodal = $_POST['hargamodal'];
$hargajual = $_POST['hargajual'];
$stok = $_POST['stok'];

$total_modal = $hargamodal * $stok;
$total_jual = $hargajual * $stok;

$total1 = number_format($total_modal, 3, ".", ".");


$total2 = number_format($total_jual, 3, ".", ".");


$cek = mysql_query("SELECT * FROM tb_barang where kode_barang = '$kodebarang' ") or die(mysql_error());

$cek_kod = mysql_fetch_assoc($cek);

if ($cek_kod['kode_barang'] == $kodebarang) {

	 echo "<script>alert( 'Maaf kode barang yang aanda masukan sudah ada' ); window.location.href='data_barang.php'; </script>";
    
} else {



$result = mysql_query("INSERT INTO tb_barang VALUES('','$kodebarang','$namabarang','$merek','$hargamodal','$hargajual','$stok', '$total1', '$total2')") or die(mysql_error());

if ($result == TRUE) {
	echo "data berhasil di masukan";
	header("Location:data_barang.php?tambah");
} else {

	echo "gagal";
}

}


 ?>