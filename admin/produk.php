

<?php 
if (!isset($_SESSION)) {
         include "sidebar.php";
        include "header.php";
    }

  

  include "../koneksi.php";

    
  
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Produk Tokoku</h1>
    
<hr>

<?php 

if (isset($_GET['tambah'])){


  
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> data barang berhasil di input.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';


} else if (isset($_GET['edit'])) {


  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> data barang berhasil di edit.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  
}

 ?>          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama barang</th>
                      <th>Merek</th>
                      <th>Harga</th>
                      <th>Jumlah stok</th>
                      <th>Beli</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "../koneksi.php";
                    $result = mysql_query("SELECT * FROM tb_barang") or die(mysql_error());
                    $no = 1;
                    while ($data = mysql_fetch_array($result)) {

                   ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kode_barang'] ?></td>
                      <td><?php echo $data['nama_barang'] ?></td>
                      <td><?php echo $data['merek'] ?></td>
                      <td>Rp.<?php echo number_format($data['harga_jual'], 3, ",", ".") ?>,-</td>

                      <?php 

                        if ($data['jumlah_stok'] < 1) {

                            echo "<td>0</td>";
                          
                        } else {
                           ?>

                      <td><?php echo $data['jumlah_stok'] ?></td>

                    <?php } ?>
                      <td>

                         <?php 

                        if ($data['jumlah_stok'] < 1) {

                            echo "<button type='button' class='btn btn-primary' disabled>Beli</button>";
                          
                        } else {
                           ?>

                      <a href="cart.php?act=add&amp;barang_id=<?php echo $data['id']; ?>&amp;ref=produk.php" class="btn btn-success">Beli</a>

                    <?php } ?>

                    

                      </td>
                      
                      
                    </tr>
                        <?php } ?>
                  </tbody>

            
                </table>


                <hr>
                <input type="submit" name="hapus"  disabled value="" class="btn btn-primary btn-lg btn-block">
                
                <hr>
                


                <br>
                 <?php require("cart_view.php"); ?></td>


<form class="form-inline" method="POST" action="">
  <label><b>Totoal harga</b></label>
  <div class="form-group mx-sm-2 mb-1">
    
    <input type="text" class="form-control" name="total" disabled value="Rp.<?php echo  number_format($total,3, ",", "." )?>,-">
    <input type="hidden" class="form-control" name="total1" value="<?php echo $total; ?>">
  </div>

  <label>Jumlah uang</label>
  <div class="form-group mx-sm-2 mb-1">
    <input type="number" class="form-control" name="uang">
  </div>
  <input type="submit" name="kirim" class="btn btn-primary" value="Kembalian">
  </form> 

  <?php 

  if (isset($_POST['kirim'])) {
   


    $total = $_POST['total1'];
    $uang= $_POST['uang'];

    $kembalian = $uang - $total;
    echo  "<h3> Rp.". number_format($kembalian,3, ",", "." ). ",-</h3>";
  }
   ?>



              </div>
            </div>
          </div>

        </div>


</div>


 
<?php 

  include "footer.php";
 ?>
