<?php


include '../../koneksi.php';
require('../media/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'LAPORAN DATA PENJUALAN TOKOKU',0,'C');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Melati Kecamatan Stabat, Kabupaten Langkat',0,'C');    
$pdf->SetFont('Times','B',10);
$pdf->SetX(4);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Sistem pendataan data barang tokoku',0,'C');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',5);
	

	$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
	$pdf->Cell(3, 0.8, 'Nama', 1, 0, 'C');
	$pdf->Cell(3, 0.8, 'Alamat', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Tgl Beli', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Tgl Bayar', 1, 0, 'C');
	
	$pdf->Cell(2, 0.8, 'DP', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Kode Brg', 1, 0, 'C');
	$pdf->Cell(3, 0.8, 'Nama brg', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Merek', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Harga', 1, 0, 'C');
	$pdf->Cell(1, 0.8, 'Jml', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Total', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Sisa Bayar', 1, 1, 'C');

	$pdf->SetFont('Arial','',6.3);

$no=1;
$total = 0;



$query=mysql_query("select * from tb_hutang ORDER BY id DESC ");

 while($lihat=mysql_fetch_array($query)){

 	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1, 0.8, $no , 1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['nama'],1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['alamat'], 1, 0,'L');
 	$pdf->Cell(2, 0.8, $lihat['tanggal_pembelian'],1, 0, 'L');
 	$pdf->Cell(2, 0.8, $lihat['tanggal_pelunasan'],1, 0, 'L');
 	
	$pdf->Cell(2, 0.8, "Rp ". $lihat['uang_muka'],1, 0, 'L');
	$pdf->Cell(2, 0.8,  $lihat['kode_barang'],1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['nama_barang'], 1, 0,'L');
	$pdf->Cell(2, 0.8, $lihat['merek'], 1, 0,'L');
	$pdf->Cell(2, 0.8, "Rp.". $lihat['harga_jual'], 1, 0,'L');
	$pdf->Cell(1, 0.8,  $lihat['jumlah_stok'],1, 0, 'L');
	$pdf->Cell(2, 0.8, "Rp.". $lihat['total_harga'], 1, 0,'L');
	$pdf->Cell(2, 0.8,"Rp.".  $lihat['sisa_pembayaran'], 1, 1,'L');
	
	
	$no++;
	$pdf->SetFont('Arial','B',7);


	 }


	$x=mysql_query("select sum(total_harga) as total from tb_hutang");
                $xx=mysql_fetch_array($x);


	 $pdf->ln(1);
	 $pdf->Cell(5, 0.4, 'Total harga', 0, 0, 'L');
	 $pdf->Cell(2, 0.4," : Rp. ". number_format($xx['total'], 3, ",", "."), 0, 1, 'L');


	

	$total=mysql_query("select sum(sisa_pembayaran) as total from tb_hutang");
                $xx=mysql_fetch_array($total);

	 $pdf->ln(1);
	 $pdf->Cell(5, 0.4, 'Total uang yang belum di bayar', 0, 0, 'L');
	 $pdf->Cell(2, 0.4," : Rp. ". number_format($xx['total'], 3, ",", "."), 0, 1, 'L');



$pdf->Output("laporan_data_hutangall.pdf","I");

?>

