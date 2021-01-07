

<?php 

  include "sidebar.php";
  include "header.php";
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

                        include "../koneksi.php";
                        $produk = $_POST['pilih'];
                        $jumlah_dipilih = count($produk);

                        for($x=0;$x<$jumlah_dipilih;$x++) {
                         echo "<pre>";
                      print_r($produk);
                      echo "</pre>";
                        

                        $result = mysql_query("SELECT * FROM tb_barang WHERE id = '$produk[$x]'");

                         $no = 1;
                        while ($data = mysql_fetch_array($result)) {


                       ?>
                      <tr>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['merek']; ?></td>
                        <td><?php echo $data['harga_jual']; ?></td>
                        
                      </tr>
                      
                    <?php }  } ?>

                    <tr class="mt-4">
                       <th></th>
                       <th></th>
                        <th>Total Harga :</th>

                        <?php 

                          include "../koneksi.php";
                          $produk = $_POST['pilih'];
                          $jumlah_dipilih = count($produk);
                          $n = 0;
                          for($x=0;$x<$jumlah_dipilih;$x++) {
                          
                          $total = mysql_query("select sum(harga_jual) as totaljual from tb_barang where id = '$produk[$x]' ");
                          $xx=mysql_fetch_array($total);      
                          echo $xx ['totaljual'];

                          
                       
                         }?>
                        <th></th>
                      </tr>
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
