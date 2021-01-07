<?php 


include "../koneksi.php";


$kode_barang = $_POST['kode_barang'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal_pembelian = $_POST['tanggal_pembelian'];
$tanggal_pelunasan = $_POST['tanggal_pelunasan'];
$jumlah = $_POST['jumlah'];
$uang_muka = $_POST['uang_muka'];


$result = mysql_query("SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang' ")or die(mysql_error());
$data = mysql_fetch_assoc($result);

$nama_barang = $data['nama_barang'];
$merek = $data['merek'];
$harga_jual = $data['harga_jual'];
$total = $harga_jual * $jumlah;
$sisa = $uang_muka  - $total;
$total1 = number_format($total, 3, ".", ".");
$sisa1 = number_format($sisa, 3, ".", "."); 
$a = abs($sisa1);
$sisa2 = number_format($a, 3, ".", "."); 



$input = mysql_query("INSERT INTO tb_hutang VALUES ('','$nama','$alamat','$tanggal_pembelian','$tanggal_pelunasan','$uang_muka','$kode_barang','$nama_barang','$merek','$harga_jual','$jumlah','$total1', '$sisa2')") or die(mysql_error());

if ($input == true) {
	  echo "<script>alert( 'Data hutang berhasil di simpan' ); window.location.href='data_hutang.php';</script>";

} else {


	echo "data gagal di  input";
}




 ?>