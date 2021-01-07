<?php 

  include "sidebar.php";
  include "header.php";

 ?>
   
        <div class="container-fluid">

        
          <h1 class="h3 mb-4 text-gray-800">Detail data hutang</h1>
          <!-- Earnings (Monthly) Card Example -->
            


          <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data hutang <h3> <?= $_GET['nama']; ?></h3></h6>
                </div>
                <div class="card-body">

                  

                
                    <a href="data_hutang.php" class="btn btn-primary"> Kembali </a>
                                      
              </div> 


                  <table class="table table-striped table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal pembelian</th>
                        <th scope="col">Tanggal pelunasan</th>
                        <th scope="col">DP</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Kode barang</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Harga jual</th>
                        <th scope="col">Jmlh</th>
                        <th scope="col">Total harga</th>
                        <th scope="col">Sisa bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                      <?php 


                      include "../koneksi.php";


                      $nama = $_GET['nama'];


                     
                      $result = mysql_query("SELECT * FROM tb_hutang WHERE nama = '$nama'") or die(mysql_error());
                      $no = 1;
                      // $data = mysql_fetch_assoc($result);
                      while ($data=mysql_fetch_assoc($result)) {
                       
                   ?>
                      <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php  echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['tanggal_pembelian']; ?></td>
                         <td><?php echo $data['tanggal_pelunasan']; ?></td>
                         <td><?php echo $data['uang_muka']; ?></td>
                         <td><?php echo $data['nama_barang']; ?></td>
                         <td><?php echo $data['kode_barang']; ?></td>
                         <td><?php echo $data['merek']; ?></td>
                         <td>Rp.<?php echo $data['harga_jual']; ?></td>
                         <td><?php echo $data['jumlah_stok']; ?> barang</td>
                         <td>Rp. <?php echo $data['total_harga']; ?>,-</td>
                         
                         <td>Rp. <?php echo $data['sisa_pembayaran']; ?>.000,-</td>
                         <td>
                           
                           <?php 

                              if ($data['sisa_pembayaran'] == 0 ) {
                                echo "<label style='color: blue;'> Angsuran lunas";
                              } else {
                                  echo "<label style='color: red;'> Angsuran belum lunas";

                              }

                            ?>


                         </td>
                          <td></td>
                         <td>
                          
                      

                        <a href="#" type="button" class="badge badge-success" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Bayar</a>

                         

                          <div class="modal fade" id="myModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel<?php echo $data['id']; ?>">Form bayar hutang</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="bayar_hutang.php">

                                    <?php
                                       $id = $data['id']; 


                                           include "../koneksi.php";

                                           $bayar = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id'") or die(mysql_error());

                                           while ($tmp = mysql_fetch_assoc($bayar)) {


                                  
                                     
                                      ?>
                                    <div class="form-group">
                                       <input type="hidden" name="id" class="form-control" id="recipient-name" value="<?php echo $tmp['id']; ?>">
                                      <label for="recipient-name" class="col-form-label">Nama</label>
                                      <input type="text" name="nama" class="form-control" id="recipient-name" value="<?php echo $tmp['nama']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Kode barang</label>
                                      <input type="text" class="form-control" id="recipient-name" name="kode_barang" value="<?php echo $tmp['kode_barang']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Tanggal bayar</label>
                                      <input type="date" name="tanggal"  required="" class="form-control" id="recipient-name" >
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Harga barang</label>
                                      <input type="text" name="harga_barang" class="form-control" id="recipient-name" value="Rp. <?php echo $tmp['harga_jual']; ?>" readonly>
                                    </div>
                                     <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Jumlah</label>
                                      <input type="text" name="jumlah" class="form-control" id="recipient-name" value="<?php echo $tmp['jumlah_stok']; ?>" readonly>
                                    </div>
                                     <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Total harga</label>
                                      <input type="text" name="total_harga" class="form-control" id="recipient-name" value="Rp. <?php echo $tmp['total_harga']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Sisa utang</label>
                                      <input type="text" name="sisa_utang" class="form-control" id="recipient-name" value="Rp. <?php echo $tmp['sisa_pembayaran']; ?>.000"readonly>
                                      <input type="hidden" name="sisa_utang" class="form-control" value="<?php echo $tmp['sisa_pembayaran']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Bayar</label>
                                      <input type="number" name="bayar" class="form-control" id="recipient-name"  required="" value="" min="1" max="<?php echo $tmp['sisa_pembayaran']; ?>" >
                                    </div>
                                    
                                 


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                  <input type="submit" name="kirim" class="btn btn-primary" value="Bayar hutang">
                                </div>
                                 </form>

                                <?php } ?>
                              </div>
                            </div>
                          </div>


                        <a href="hapus_hutang.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah kamu yakin igin menghapus?')" class="badge badge-danger"> Hapus </a>

                        <a href="edit_hutang.php?id=<?=$data['id'];?>"class="badge badge-warning"> Edit </a>
                        <a href="detail_angsuran.php?id=<?=$data['id'];?>"class="badge badge-primary"> Detail angsuran </a>
                      </td>
                        </tr>
                      </tr>
                       <?php } ?>

                    </tbody>
                  </table>

               
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
