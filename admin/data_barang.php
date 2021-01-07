

<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Data barang</h1>
      
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    <i class="fas fa-fw fa-plus"></i> Tambah Barang
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Fomr tambah barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="tambah_act.php">
          <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kodebarang" required="">
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="namabarang" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Merek</label>
            <input type="text" class="form-control" name="merek" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Harga Modal</label>
            <input type="number" class="form-control" name="hargamodal" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" class="form-control" name="hargajual" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" class="form-control" name="stok" placeholder="" required="">
          </div>





          
          <button type="submit" class="btn btn-primary" name="tambah"> Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

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



      <a href="laporan/cetak_barang.php" target="_blank" class="btn btn-danger" style=" margin-bottom: 7px;"> <i class="fa fa-print" aria-hidden="true"></i> Cetak data barang</a>  
      <hr>        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar data barang</h6>
               
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                
            </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama barang</th>
                      <th>Merek</th>
                      <th>Harga modal</th>
                      <th>Harga jual</th>
                      <th>Jumlah stok</th>
                      <th>Opsi</th>
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
                      <td></td>
                      <td><?php echo $data['kode_barang'] ?></td>
                      <td><?php echo $data['nama_barang'] ?></td>
                      <td><?php echo $data['merek'] ?></td>
                      <td>Rp.<?php echo number_format($data['harga_modal'], 3, ",", ".") ?>,-</td>
                      <td>Rp.<?php echo number_format($data['harga_jual'], 3, ",", ".") ?>,-</td>
                      <td><?php echo $data['jumlah_stok'] ?></td>
                      <td>
                        <a href="hapus_barang.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah kamu yakin igin menghapus?')" class="btn btn-outline-danger"> Hapus </a>

                        <a href="edit_barang.php?id=<?=$data['id'];?>"class="btn btn-outline-warning"> Edit </a>
                      </td>
                      
                    </tr>
                        <?php } ?>
                  </tbody>

            
                </table>
                <hr>
                Total Modal :

                <?php 

                $x=mysql_query("select sum(harga_modal) as total from tb_barang"); 
                $xx=mysql_fetch_array($x);      
                echo "<b> Rp.". number_format($xx['total'], 3, ",", "." ).",-</b>";   

                 ?>
                 <br>

                 Total Harga Jual :

                <?php 

                  $x=mysql_query("select sum(harga_jual) as totaljual from tb_barang"); 
                $xx=mysql_fetch_array($x);      
                echo "<b> Rp.". number_format($xx['totaljual'], 3, ",", "." ).",-</b>";   

                 ?>
                <hr>
              </div>
            </div>
          </div>

        </div>



</div>


   

<?php 

  include "footer.php";
 ?>
