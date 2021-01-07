

<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

  <?php 

  $id = $_GET['id'];

 $nama = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id' ") or die(mysql_error());
 while ($aa = mysql_fetch_assoc($nama)) {

   ?>

<h1 class="h3 mb-4 text-gray-800" style="color: red;">Data pembayaran angsuran <?php echo $aa['nama']; ?></h1>






<a href="detail_hutang.php?nama=<?php echo $aa['nama']; ?>" class="btn btn-primary"> Kembali </a>
      
<?php } ?>

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



      <a href="laporan/cetak_barang.php" target="_blank" class="btn btn-danger" style=" margin-bottom: 7px;"> <i class="fa fa-print" aria-hidden="true"></i> Cetak data angsuran</a>  
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
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kode barang</th>
                      <th>Tgl bayar</th>
                      <th>Harg barang</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Bayar</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include "../koneksi.php";


                    $result = mysql_query("SELECT * FROM bayar WHERE id = '$id'") or die(mysql_error());
                    $no = 1;
                    while ($data = mysql_fetch_array($result)) {

                   ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['kode_barang'] ?></td>
                      <td><?php echo $data['tanggal'] ?></td>
                      <td> <?php echo $data['harga'] ?>,-</td>
                      <td> <?php echo $data['jumlah'] ?></td>
                      <td> <?php echo $data['total_harga'] ?>,-</td>
                      <td> Rp. <?php echo $data['sisa_pembayaran'] ?>,-</td>

                      <td>
                        <a href="hapus_detailangsuran.php?id_bayar=<?=$data['id_bayar'];?>" onclick="return confirm('Apakah kamu yakin igin menghapus?')" class="btn btn-outline-danger"> Hapus </a>

                        <a href="edit_bayar.php?id_bayar=<?=$data['id_bayar'];?>"class="btn btn-outline-warning"> Edit </a>
                      </td>
                      
                    </tr>
                        <?php } ?>
                  </tbody>

            
                </table>
                <hr>



                <?php 

                    $id = $_GET['id'];

                   $nama = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id' ") or die(mysql_error());
                   while ($aa = mysql_fetch_assoc($nama)) {

                     ?>

                Dp angsuran :<b> Rp. <?php echo $aa['uang_muka']; ?> </b>
                <br>
                Total Pembayaran angsuran <?php echo $aa['nama']; ?>  :

              <?php } ?>

                <?php 

                $x=mysql_query("select sum(sisa_pembayaran) as total from bayar WHERE id = '$id'"); 
                $xx=mysql_fetch_array($x);      
                echo "<b> Rp.". number_format($xx['total'], 3, ",", "." ).",-</b>";   

                 ?>
                 <br>

                 <?php 

                    $id = $_GET['id'];

                   $nama = mysql_query("SELECT * FROM tb_hutang WHERE id = '$id' ") or die(mysql_error());
                   while ($aa = mysql_fetch_assoc($nama)) {

                     ?>

                 Sisa hutang <?php echo $aa['nama']; ?>  : <?php echo "<b> Rp.". number_format($aa['sisa_pembayaran'], 3, ",", "." ).",-</b>"; ?>


               <?php } ?>


                <hr>
              </div>
            </div>
          </div>

        </div>



</div>


   

<?php 

  include "footer.php";
 ?>
