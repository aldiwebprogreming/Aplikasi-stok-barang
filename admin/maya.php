<?php 

include "../koneksi.php";

$x=mysql_query("select sum(sisa_pembayaran) as total from bayar WHERE id = '7'"); 
                $xx=mysql_fetch_array($x); 

                $a = mysql_query("SELECT * FROM tb_hutang WHERE id = '7'") or die(mysql_error());
                $aa = mysql_fetch_array($a);

                
              	echo $angka1 = $xx['total'];
              	echo "<br>";
              	echo $angka2 = $aa['total_harga'];

              	echo "<br>";

              	  echo $hasil = $angka2 - $angka1;

              	  $akhir = $hasil - $aa['uang_muka'];


              	  echo $akhir;
 ?>