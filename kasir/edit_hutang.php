<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit hutang</h1>

      <hr>
      <h5>Form edit data hutang</h5>
      <hr>
          

    <div class="row">


      <?php 

        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM tb_hutang WHERE id='$id'");
        $data = mysql_fetch_assoc($result);

       ?>
      <div class="col-8">

          <form method="POST" action="edit_hutang_act.php">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id" required="" value="<?php echo $data['id']; ?>">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required="" value="<?php echo $data['nama']; ?>">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="" required="" value="<?php echo $data['alamat']; ?>">
          </div>
          <div class="form-group">
            <label>Tgl pembelian</label>
            <input type="date" class="form-control" name="tanggal_pembelian" placeholder="" required="" value="<?php echo $data['tanggal_pembelian']; ?>">
          </div>
          <div class="form-group">
            <label>Tgl pelunasan</label>
            <input type="date" class="form-control" name="tanggal_pelunasan" placeholder="" required="" value="<?php echo $data['tanggal_pelunasan']; ?>">
          </div>
          <div class="form-group">
            <label>DP</label>
            <input type="number" class="form-control" name="uang_muka" placeholder="" required="" value="<?php echo $data['uang_muka']; ?>">
          </div>

          <div class="form-group">
          <label for="exampleFormControlSelect1">Kode barang</label>
          <select class="form-control"  name="kode_barang">
            
             <option><?php echo $data['kode_barang']; ?></option>

              <?php 

              include "../koneksi.php";

              $result = mysql_query("SELECT * FROM tb_barang") or die(mysql_error());
              while ($a= mysql_fetch_array($result)) {
             ?>

             <option><?php echo $a['kode_barang']; ?></option>

             <?php 
              }
              ?>

              </select>
              </div>

            <div class="form-group">
            <label>Nama barang</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="" required="" value="<?php echo $data['nama_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Merek</label>
            <input type="text" class="form-control" name="merek" placeholder="" required="" value="<?php echo $data['merek']; ?>">
          </div>
          <div class="form-group">
            <label>Harga jual</label>
            <input type="number" class="form-control" name="harga_jual" placeholder="" required="" value="<?php echo $data['harga_jual']; ?>">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="" required="" value="<?php echo $data['jumlah_stok']; ?>">
          </div>
          
          
          <button type="submit" class="btn btn-primary" name="tambah">Edit Hutang</button>
          <a href="data_hutang.php" class="btn btn-warning"> Kembali  </a>
        </form>
      </div>

      </div>

    </div>



    

    
     
<?php 

  include "footer.php";
 ?>
