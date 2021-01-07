

<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data Penjualan</h1>
<hr>

<form class="form-inline" method="POST" action="laporan/cetak_penjualan.php">
  <div class="form-group mb-2">
    
  <div class="form-group mx-sm-3 mb-2">
    <input type="date" class="form-control mt-2" id="" placeholder="tanggal" name="tgl1"> 
    <label class="ml-2 mr-2">S/D</label>
    <input type="date" class="form-control mt-2" id="" placeholder="tanggal" name="tgl2">
  </div>

  <button type="submit" class="btn btn-danger mt-2 mr-2" targen="_blank" ><i class="fa fa-print" aria-hidden="true"></i> Cetak per tanggal </button>
   
</form>
<a href="laporan/cetak_penjulanall.php" target="_blank" class="btn btn-warning mt-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak semua data </a>


      
         
</div>

<hr>

<?php 

if (isset($_GET['tambah'])){


  
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> data penjualan berhasil di input.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';


} else if (isset($_GET['edit'])) {


  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> data penjualan berhasil di edit.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  
}

 ?>




          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar data barang yang terjual</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12.3px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama barang</th>
                      <th>Merek</th>
                      <th>Harga </th>
                      <th>Jumlah</th>
                      <th>Total harga</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                       <th>Kode pembelian</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "../koneksi.php";
                    $result = mysql_query("SELECT * FROM tb_beli") or die(mysql_error());
                    $no = 1;
                    $na = 0;
                    while ($data = mysql_fetch_array($result)) {

                     

                  



                   ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kode_barang'] ?></td>
                      <td><?php echo $data['nama_barang'] ?></td>
                      <td><?php echo $data['merek'] ?></td>
                      <td>Rp.<?php echo number_format($data['harga_barang'], 3, ",", ".") ?>,-</td>
                      <td><?php echo $data['jumlah_stok'] ?></td>
                      <td>Rp.<?php echo number_format($data['total_harga'], 3, ",", ".") ?>,-</td>
                      <td><?php echo $data['tanggal'] ?></td>
                      <td><?php echo $data['jam'] ?></td>
                      <td><?php echo $data['kode_pembelian'] ?></td>
                      <td>
                        <a href="hapus_penjualan.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah kamu yakin akan mengunjungi petanikode?')" class="btn btn-outline-danger"> Hapus </a>

                        <a href="edit_penjualan.php?id=<?=$data['id'];?>"class="btn btn-outline-warning"> Edit </a>
                      </td>
                      
                    </tr>
                        <?php




                      } ?>
                  </tbody>

            
                </table>
                <hr>
                Total Penjualan :

                <?php 



                $x=mysql_query("select sum(total_harga) as total from tb_beli"); 
                $xx=mysql_fetch_array($x);      
                echo "<b> Rp.". number_format($xx['total'], 3, ",", "." ).",-</b>";   

                 ?>
  
              </div>
            </div>
          </div>

        </div>


</div>


   </div>
<?php 

  include "footer.php";
 ?>
