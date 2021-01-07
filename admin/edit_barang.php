<?php 

  include "sidebar.php";
  include "header.php";
  include "../koneksi.php";
 ?>
   
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Edit barang</h1>

      <hr>
      <h5>Form edit barang</h5>
      <hr>
          

    <div class="row">


      <?php 

        $id = $_GET['id'];

        $result = mysql_query("SELECT * FROM tb_barang WHERE id='$id'");
        $data = mysql_fetch_assoc($result);

       ?>
      <div class="col-8">

          <form method="post" action="edit_act.php">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id" required="" value="<?php echo $data['id']; ?>">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" required="" value="<?php echo $data['kode_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="" required="" value="<?php echo $data['nama_barang']; ?>">
          </div>
          <div class="form-group">
            <label>Merek</label>
            <input type="text" class="form-control" name="merek" placeholder="" required="" value="<?php echo $data['merek']; ?>">
          </div>
          <div class="form-group">
            <label>Harga Modal</label>
            <input type="number" class="form-control" name="harga_modal" placeholder="" required="" value="<?php echo $data['harga_modal']; ?>">
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" class="form-control" name="harga_jual" placeholder="" required="" value="<?php echo $data['harga_jual']; ?>">
          </div>
          <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" class="form-control" name="jumlah_stok" placeholder="" required="" value="<?php echo $data['jumlah_stok']; ?>">
          </div>
          
          <button type="submit" class="btn btn-primary" name="tambah">Edit Barang</button>
          <a href="data_barang.php" class="btn btn-warning"> Kembali  </a>
        </form>
      </div>

      </div>

    </div>

        




    

    
     
<?php 

  include "footer.php";
 ?>
