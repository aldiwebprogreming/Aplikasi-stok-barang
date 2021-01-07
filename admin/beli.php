

<?php 
session_start();
  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";


 $id =  $_GET['id'];

 if (isset($_GET)) {
   if (isset($_SESSION['keranjnag'][$id])) {
      $_SESSION['keranjnag'][$id]++;
   } else {

    $_SESSION['keranjnag'][$id];
   }
 }

 


 // if (isset($_SESSION['kerenjang'][$id])) {
 //   $_SESSION['kerenjang'][$id]+=1;
 // } else {
 //   $_SESSION['kerenjang'][$id]=1;



 echo "<pre>";
 print_r($_SESSION);
echo "</pre>";

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
              <h6 class="m-0 font-weight-bold text-primary">Daftar produk yang di pilih</h6>
            </div>
            <div class="card-body">
              

                  <table class="table table-striped">
                    <thead>
                      <tr>
    
                        <th scope="col">Kode barang</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 

                    foreach ($_SESSION['kerenjang'] as $id => $jumlah) {

                      $result = mysql_query("SELECT * FROM tb_barang WHERE id = '$id'");
                      while ($data = mysql_fetch_assoc($result)) {
                     
                      
                      
                    

                       ?>
                      
                      <tr>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['merek']; ?></td>
                        <td><?php echo $data['harga_jual']; ?></td>
                        <td><a href="hapus.php">Hapus</a></td>
                        
                      </tr>

                    <?php }  }?>
                    
                    </tbody>
                  </table>

              </div>
            </div>
          </div>

        </div>


</div>


   </div>
<?php 

  include "footer.php";
 ?>
