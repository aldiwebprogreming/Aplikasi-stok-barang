<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

  <?php 
  date_default_timezone_set('Asia/Jakarta');


    $kode = date('hmYHis');

   echo "<b>Kode Pembelian : </b>"; echo "<h2>". $kode. "</h2>";

   ?>
<br>

<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama barang</th>
                      <th>Merek</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $total = 0;
                      $no=1;
                      if (isset($_SESSION['items'])) {
                            foreach ($_SESSION['items'] as $key => $val){
                                $query = mysql_query ("select tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.merek, tb_barang.harga_jual from tb_barang where tb_barang.id = '$key'");
                                $data = mysql_fetch_array ($query);
                                 
                                $jumlah_harga = $data['harga_jual'] * $val;
                                $total += $jumlah_harga;
                      ?>
                    

                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kode_barang'] ?></td>
                      <td><?php echo $data['nama_barang'] ?></td>
                      <td><?php echo $data['merek'] ?></td>
                      <td>Rp.<?php echo number_format($data['harga_jual'], 3, ",", ".") ?>,-</td>
                      <td><?php echo number_format($val); ?></td>
                      <td>Rp.<?php echo number_format($jumlah_harga, 3, ",", ".") ?>,-</td>
                      <td>
                          <a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=produk.php"  class="btn btn-primary">+</a>  <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=produk.php"  class="btn btn-warning">-</a>  <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=produk.php" class ="btn btn-danger">Hapus</a>
                          
                        </td>

                    </tr>
                       <?php
                                mysql_free_result($query);
                            }
                      }
                      ?>
  </table>
   <!-- <a href="cart.php?act=clear&amp;ref=produk.php" class = "btn btn-secondary mb-4">Hapus semua barang</a> -->
 <br>

<?php 

date_default_timezone_set('Asia/Jakarta');


foreach ($_SESSION['items'] as $key => $d) {
  $query = mysql_query ("select tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.merek, tb_barang.harga_jual from tb_barang where tb_barang.id = '$key'");
  $data = mysql_fetch_array ($query);
  $jumlah_harga = $data['harga_jual'] * $d;

 ?>        

 <form method="POST" action="jual_act.php">
   <input type="hidden" name="kode_barang<?php echo $data['kode_barang']; ?>" value="<?php echo $data['kode_barang'] ?>">
   <input type="hidden" name="nama_barang<?php echo $data['kode_barang']; ?>" value="<?php echo $data['nama_barang'] ?>">
   <input type="hidden" name="merek<?php echo $data['kode_barang']; ?>" value="<?php echo $data['merek'] ?>">
   <input type="hidden" name="harga_barang<?php echo $data['kode_barang']; ?>" value="<?php echo $data['harga_jual'] ?>">
   <input type="hidden" name="jumlah<?php echo $data['kode_barang']; ?>" value="<?php echo $d; ?>">
   <input type="hidden" name="total_harga<?php echo $data['kode_barang']; ?>" value="<?php echo number_format($jumlah_harga, 3, ".",".")  ?>">
   <input type="hidden" name="tgl<?php echo $data['kode_barang']; ?>" value="<?php echo date('Y-m-d'); ?>">
   <input type="hidden" name="waktu<?php echo $data['kode_barang']; ?>" value="<?php  echo date('H:i');?>">
   <input type="hidden" name="kode_pembelian<?php echo $data['kode_barang']; ?>" value="<?php  echo $kode;?>">

 
<?php 
}
?>  

<?php 

if ($data == false) {

  echo '<h3 align="center">Keranjang belanja kosong</h3>';
  echo "<hr>";
 
} else{
?>
<button type="submit" class="btn btn-success btn-lg btn-block" onclick="return confirm('Apakah kamu yakin ingin masukan ke sistem kerjang ?')">Simpan keranjang belanja</button>

<?php 
echo "<hr>";
 }




 ?>   

   
 </form>  

                    

