

<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

  <?php 
include "../koneksi.php";
$tgl_h = date("Y-m-d");
  $hutang = mysql_query("SELECT * FROM tb_hutang WHERE tanggal_pelunasan = '$tgl_h' ") or die(mysql_error());

  while ($cari = mysql_fetch_assoc($hutang)) {

// $date1 = $cari['tanggal_pelunasan'];
// $date = new DateTime($date1);
// $date_plus = $date->modify("+1 days");
// $tgl =  $date_plus->format("Y-m-d");




    if ($cari == NULL) {
      echo "Tidak ada pemberitahuan";

         

    } 
     elseif ($cari['tanggal_pelunasan'] == $tgl_h) {

?>


<div class="alert alert-primary" role="alert">
<b><?php  echo $cari['nama']; ?></b>, saatnya bayar hutang.
</div>



<?php
    }
 }

 ?>

<h1 class="h3 mb-4 text-gray-800">Data Hutang</h1>


      
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    <i class="fas fa-fw fa-plus"></i> Tambah Data Hutang
</button>
<hr>





      
         
</div>





<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Fomr tambah hutang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="tambah_hutang.php">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required="">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="" required="">
          </div>
          <div class="form-group">
            <label>Tanggal pembelian</label>

            <?php 

            date_default_timezone_set('Asia/Jakarta');


             ?>
            <input type="date" class="form-control" name="tanggal_pembelian" placeholder="" required="">
          </div>

           <div class="form-group">
            <label>Tanggal pelunasan</label>
            <input type="date" class="form-control" name="tanggal_pelunasan" placeholder="" required="">
          </div>

          
          <div class="form-group">
          <label for="exampleFormControlSelect1">Kode barang</label>
          <select class="form-control" id="exampleFormControlSelect1" name="kode_barang">
            
             <option></option>

              <?php 

              include "../koneksi.php";

              $result = mysql_query("SELECT * FROM tb_barang") or die(mysql_error());
              while ($data= mysql_fetch_array($result)) {
             ?>

             <option><?php echo $data['kode_barang']; ?></option>

             <?php 
              }
              ?>

              </select>
              </div>

              <div class="form-group">
            <label>Uang muka</label>
            <input type="number" class="form-control" name="uang_muka" placeholder="" required="">
          </div>
          

          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name=jumlah placeholder="" required="">
          </div>

          
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
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
  <strong>SUKSES!</strong> data hutang berhasil di input.
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
              <h6 class="m-0 font-weight-bold text-primary">Daftar data hutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 12.3px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Tanggal pembelian</th>
                      <th>Tanggal pelunasan  </th>
                      <th>Harga barang</th>
                      <th>DP harga barang</th>
                      <th>Sisa pembayaran</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "../koneksi.php";
                    $result = mysql_query("SELECT * FROM tb_hutang") or die(mysql_error());
                    $no = 1;
                    $na = 0;
                    while ($data = mysql_fetch_array($result)) {

                     

                  



                   ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['alamat'] ?></td>
                      <td><?php echo $data['tanggal_pembelian'] ?></td>
                      <td><?php echo $data['tanggal_pelunasan'] ?></td>
                      <td>Rp. <?php echo $data['harga_jual'] ?>,-</td>
                      <td>Rp. <?php echo $data['uang_muka'] ?>,-</td>
                      <td>Rp. <?php  echo $data['sisa_pembayaran']?>,-</td>
                    
                      <td>
                         <a href="detail_hutang.php?id=<?=$data['id'];?>"class="btn btn-outline-success"> Detail </a>
                        <a href="hapus_hutang.php?id=<?=$data['id'];?>" onclick="return confirm('Apakah kamu yakin akan mengunjungi petanikode?')" class="btn btn-outline-danger"> Hapus </a>

                        <a href="edit_hutang.php?id=<?=$data['id'];?>"class="btn btn-outline-warning"> Edit </a>
                      </td>
                      
                    </tr>
                        <?php




                      } ?>
                  </tbody>

            
                </table>
                <hr>
                Total  uang yang belum di bayar :

                <?php 



                $x=mysql_query("select sum(sisa_pembayaran) as total from tb_hutang"); 
                $xx=mysql_fetch_array($x);      
                echo "<b> Rp.". number_format($xx['total'], 3, ".", "." ).",-</b>";   

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
