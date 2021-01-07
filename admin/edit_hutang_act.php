<?php 


include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal_pembelian = $_POST['tanggal_pembelian'];
$tanggal_pelunasan = $_POST['tanggal_pelunasan'];
$uang_muka = $_POST['uang_muka'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$merek = $_POST['merek'];
$harga_jual = $_POST['harga_jual'];
$jumlah = $_POST['jumlah'];

$total = $harga_jual * $jumlah;
$sisa = $uang_muka  - $total;
$total1 = number_format($total, 3, ".", ".");
$sisa1 = number_format($sisa, 3, ".", "."); 
$a = abs($sisa1);
var_dump($a);
$sisa2 = number_format($a, 3, ".", "."); 
var_dump($sisa2);




$edit = mysql_query ("UPDATE tb_hutang SET nama = '$nama', alamat='$alamat', tanggal_pembelian = '$tanggal_pembelian', tanggal_pelunasan ='$tanggal_pelunasan', uang_muka='$uang_muka', kode_barang = '$kode_barang', nama_barang = '$nama_barang', merek = '$merek', harga_jual ='$harga_jual', jumlah_stok ='$jumlah', total_harga = '$total1', sisa_pembayaran = '$sisa2' WHERE id = '$id'") or die(mysql_error());


if ($edit) {


	header("location:data_hutang.php?edit");
} else {


	 header("Location:data_penjualan.php?erroredit");
}



 ?>