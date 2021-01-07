<?php 

  include "sidebar.php";
  include "header.php";

 ?>
   
        <div class="container-fluid">

        
          <h1 class="h3 mb-4 text-gray-800">Detail data hutang</h1>
          <!-- Earnings (Monthly) Card Example -->
            


          <div class="col-lg-8 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data hutang</h6>
                </div>
                <div class="card-body">

                  <?php 


                      include "../koneksi.php";


                      $id = $_GET['id'];

                      $result = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id'") or die(mysql_error());
                      $data = mysql_fetch_assoc($result);
                   ?>

                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nama :</th>
                          <td><?php echo $data['nama']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Alamat :</th>
                         <td><?php echo $data['alamat']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Tgl Beli:</th>
                          <td><?php echo $data['tanggal_pembelian']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Tgl Lunas :</th>
                          <td><?php echo $data['tanggal_pelunasan']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">DP :</th>
                          <td><?php echo $data['uang_muka']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Kode Barang :</th>
                          <td><?php echo $data['kode_barang']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Nama Barang :</th>
                          <td><?php echo $data['nama_barang']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Merek :</th>
                          <td><?php echo $data['merek']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Harga :</th>
                          <td>Rp.<?php echo $data['harga_jual']; ?></td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Jumlah :</th>
                          <td><?php echo $data['jumlah_stok']; ?> barang</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Total Harga:</th>
                          <td>Rp. <?php echo $data['total_harga']; ?>,-</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col">Sisa Pembayaran :</th>
                          <td>Rp. <?php echo $data['sisa_pembayaran']; ?>,-</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <td></td>
                        </tr>
                      </thead>
                
                    </table>

                    <a href="data_hutang.php" class="btn btn-primary"> Kembali => </a>
                                      
              </div>

              <!-- Approach -->
              
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>

        </div>


    

    
     
<?php 

  include "footer.php";
 ?>
