<?php
include '../../koneksi.php';
require('../media/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'LAPORAN DATA BARANG TOKOKU',0,'C');
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
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
	$pdf->Cell(3, 0.8, 'Kode Barang', 1, 0, 'C');
	$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
	$pdf->Cell(3, 0.8, 'Merek', 1, 0, 'C');
	$pdf->Cell(4, 0.8, 'Harga Modal', 1, 0, 'C');
	$pdf->Cell(4, 0.8, 'Harga Jual', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Jumlah Stok', 1, 0, 'C');
	$pdf->Cell(2, 0.8, 'Total Harga', 1, 1, 'C');
	$pdf->SetFont('Arial','',6.3);

$no=1;
$total = 0;
$query=mysql_query("select * from tb_barang ORDER BY id DESC ");

 while($lihat=mysql_fetch_array($query)){

 	$a = $lihat['harga_jual'] * $lihat['jumlah_stok'];
	 $total +=$a;


 	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['kode_barang'],1, 0, 'L');
	$pdf->Cell(4, 0.8, $lihat['nama_barang'], 1, 0,'L');
 	$pdf->Cell(3, 0.8, $lihat['merek'],1, 0, 'L');
	$pdf->Cell(4, 0.8, "Rp ". $lihat['harga_modal'],1, 0, 'C');
	$pdf->Cell(4, 0.8, "Rp ". $lihat['harga_jual'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah_stok']. " stok", 1, 0,'C');
	$pdf->Cell(2, 0.8, "Rp ". number_format($lihat['total_jual'], 3, ",", "."), 1, 1,'L');
	
	$no++;
	$pdf->SetFont('Arial','B',7);


	 }


	$x=mysql_query("select sum(total_jual) as total from tb_barang"); 
                $xx=mysql_fetch_array($x);


	 $pdf->ln(3);
	 $pdf->Cell(3, 0.4, 'Total Harga Jual', 0, 0, 'L');
	 $pdf->Cell(2, 0.4," : Rp. ". number_format($xx['total'], 3, ",", "."), 0, 1, 'L');

$x=mysql_query("select sum(total_modal) as total from tb_barang"); 
                $xx=mysql_fetch_array($x);

	 $pdf->Cell(3, 0.4, 'Total Harga Modal', 0, 0, 'L');
	 $pdf->Cell(2, 0.4," : Rp. ". number_format($xx['total'], 3, ",", "."), 0, 0, 'L');

	

$pdf->Output("laporan_data_barang.pdf","I");

?>

